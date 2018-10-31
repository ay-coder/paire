<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $this->validate($request,[
            'oldpassword' => 'required'
        ]);
        if(($request->input('password')))
        {
            $this->validate($request,[
                'password' => 'required',
                'repassword' => 'required:same:password'
            ]);
        }
        if($request->hasFile('profilePic')){
            $this->validate($request,[
                'profilePic' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:max_width=5000,max_height=5000,min_height=200,min_width=200',
            ]);
        }

        $user = new User();
        return $user->updateUserAction($request);

    }
}
