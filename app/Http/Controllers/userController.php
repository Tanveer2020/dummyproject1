<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userController extends Controller
{
    public function index()
{


	return view('welcome');
}


public function show($id,$email)
{



	$info = ['khan','khan@gmail.com',25,'nowshera'];
	$age = 20;

return view("profile", ['myId' => $id, 'myEmail' => $email, 'info' => $info,'age' => $age]);


}


public function welcome()
{

//query string
	$name = request('name');
	$address = request('address');
return $name . "===" . $address;
	//return "welcome message";
}

}
