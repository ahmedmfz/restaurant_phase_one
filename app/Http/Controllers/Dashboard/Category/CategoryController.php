<?php

namespace App\Http\Controllers\Dashboard\Category;


use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index ()
    {
        return view('dashboard.category.index');
    }

    public function getCategory()
    {
  
        $query = Menu::select([
            'id',
            'name',
            'active'
        ]);
        
        return datatables($query)
        ->addIndexColumn()
        ->addColumn('checkbox','dashboard.category.checkbox')
        ->addColumn('action', 'dashboard.category.action')
        ->addColumn('product', function(Menu $categoey) {
            return  $categoey->products->count();
        })
        ->rawColumns(['checkbox', 'action'])
        ->setRowAttr( ['align'=>'center'])
        ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string',
       ]);


       $data = $request->all();
       $data = Menu::create($data);

       return response(array('data' => $data, 'success' => isset($data)));
    }


    public function update(Request $request)
    {

       $request->validate([
            'id'=>'integer|exists:menus,id',
            'name'=>'required|string',
            'active'=>'required|string|max:2',
       ]);

       $data = $request->all();
       $id= $data['id'];
     
       $target_data =  Menu::where('id',$id)->first();
    
       $target_data->update($data);

       return response(array('data' => $target_data, 'success' => isset($target_data)));

       
    }

    public function destroy(Request $request)
    {

        $data = $request->all();
        $id = $data['id'];
        $target_data =  Menu::where('id',$id)->first();
        $target_data->delete();

        return response(['data' => 'success','message'=>'done','status' =>200,]);
    }
}
