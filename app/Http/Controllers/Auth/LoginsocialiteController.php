<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Pixelpeter\Genderize\Facades\Genderize;

class LoginsocialiteController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        $user = Socialite::driver($provider)->stateless()->user();

        $token = $user->token;
        //$id    = $user->getId();
        $name  = $user->getName();
        $email = $user->getEmail();

        //take first name and use genderize api package to know gender
        $buildGender = explode(" ",$user->getName());
        $firstName =  $buildGender[0];
        $lastName =  $buildGender[1];
        $response = Genderize::name( $firstName )->get();
        $gender = $response->result->first()->gender; 

        $target_user = User::firstOrCreate([
            'email' =>  $email
        ],[
            'first_name' =>  $firstName,
            'last_name' => $lastName,
            'username' => trim(Str::lower(Str::replaceArray(" ",["_"],$name))),
            'gender' => $gender,
            'email_verified_at'=> Carbon::now(),
            'remember_token'=>   $token,
            'email' =>  $email,
            'password' => Hash::make($email),
        ]);

        Auth::login( $target_user,true);
        return redirect('/');
    }
}
