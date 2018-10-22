<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Constant;

class UserCtrl extends Controller
{
    public function index(Request $request)
    {
      $localCode = $request->get('localCode');
    	$phoneNumber = $request->get('phoneNumber');
			$user = User::where(['phoneNumber' => $phoneNumber,'localCode' => $localCode ]);
			return [
					'status' => Constant::SUCCESS, 
					'phoneExist' => $user->count() > 0,
					'userInfo' => $user->first()
				];
    }

    public function newUser(Request $request)
    {
      $localCode = $request->get('localCode');
    	$phoneNumber = $request->get('phoneNumber');
    	$username = $request->get('username');
    	$lastName = $request->get('lastName');
    	$email = $request->get('email');
    	$role = $request->get('role');
			$user = User::firstOrCreate([
					'phoneNumber' => $phoneNumber,
					'localCode' => $localCode
				],[
					'email' => $email,
					'name' => $username,
					'lastName' => $lastName,
					'role' => $role,
				]);
			return [
					'status' => Constant::SUCCESS, 
					'user' => $user
				];
    }
}
