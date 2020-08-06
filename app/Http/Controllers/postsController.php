<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class postsController extends Controller
{
    public function index()
    {


    	return 'welcome';
    }


    public function create()

    {

//method 1 to insert
//$newPost = new Post;
//$newPost->title = "New title";
//$newPost->body = "New Post body";
//$newPost->category = "laravel";
//$newPost->save();

    	//method 2 to insert

    	//$newPost = Post::create(['title' => 'Second Post title', 'body' => 'Second Post body', 'category' => 'reactjs']);
    	//$newPost->save();

//to fetch record from database 1 method

//$post = Post::where('id',2)->first();

//print_r($post->title);
//to fetch record from database 2 method
    	//$post = Post::find(2);
    	//print_r($post->body);

    	// to fetch record through foreach loop

    	//$posts = Post::find([1,2]);

    //	foreach ($posts as $post):
//echo $post->title, "<br>";
  //endforeach;


//update method

    	//$post = Post::find(2);
    	//$post->title = "Second Post title updated";
    	//$post->body = "Second Post body updated";
    	//if($post->save()) 
    	//{

    		//echo "your post has been updated successfully";
    	//}


//delete method

    	$post = Post::find(2);

    	if($post->delete())
{

echo "Your record has been deleted successfully";

}
   
}
}
