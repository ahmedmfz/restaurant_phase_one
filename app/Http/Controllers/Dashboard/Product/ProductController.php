<?php

namespace App\Http\Controllers\Dashboard\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Menu::all();
        return view('dashboard.product.index',compact('categories'));
    }

    public function getProduct()
    {
  
        $query = Product::select([
            'id',
            'name',
            'price',
            'qty',
            'description',
            'menu_id',
            'active'
        ]);
        
        return datatables($query)
        ->addIndexColumn()
        ->addColumn('checkbox','dashboard.product.checkbox')
        ->addColumn('action', 'dashboard.product.action')
        ->addColumn('product', function(Product $product) {
            return  $cat =  $product->category->name;
        })
        ->rawColumns(['checkbox', 'action','product'])
        ->setRowAttr( ['align'=>'center'])
        ->make(true);
    }

    public function getCategoryName(Request $request){
        $id = $request->id;
        $data = Menu::where('id',$id)->first();
        return response(array('name' => $data->name, 'success' => isset($data->name)));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
            'price'=>'required|numeric',
            'qty'=>'required|numeric',
            'menu_id'=>'required|integer',
            'description'=>'required|string',
       ]);


       $data = $request->all();
       $data = Product::create($data);

       return response(array('data' => $data, 'success' => isset($data)));
    }

    
    
    public function update(Request $request)
    {
        $request->validate([
            'id'=>'required|integer|exists:products,id',
            'name'=>'required|string',
            'price'=>'required|numeric',
            'qty'=>'required|numeric',
            'menu_id'=>'required|integer|exists:menus,id',
            'description'=>'required|string',
            'active'=>'required|string|max:2',
       ]);

       $data = $request->all();
       $id= $data['id'];
     
       $target_data =  Product::where('id',$id)->first();
    
       $target_data->update($data);

       return response(array('data' => $target_data, 'success' => isset($target_data)));

    }

    public function destroy(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $target_data =  Product::where('id',$id)->first();
        $target_data->delete();

        return response(['data' => 'success','message'=>'done','status' =>200,]);
    }
}
