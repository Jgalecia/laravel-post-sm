<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PostFacebook;

class PostFacebooksController extends Controller
{
    public function index ()
    {
        $posts= PostFacebook::all(['id','title','content','image']);
    
        $data = [
            'posts' => $posts,
        ];

        return view ('welcome',$data);
    }

    public function storeImage(Request $request){
        $data= new PostFacebook();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $data['image']= $filename;
        }
        $data->save();
        return view ('welcome');
    }    
}

