<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use App\Models\posts_tags;
use App\Models\tags;
use App\Models\User;

use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function pantallaInicio(){

    }

    public function PostCategory(){
        //obtenemos la categoria
        $category = Category::findorfail($id);
        //consulta posts
        $posts = Post::where('category_id', $category->id)
        ->latest('id')
        ->limit(3)
        ->get();
        return response()->json([
            'categoria' => $category,
            'articulo'  => $posts
        ]);
    }
    
    public function categories(){
        $categories = Category::all();
        return response()->json(['Categories' => $categories ]);
    }
    public function unaCategoria($id){
        $category = Category::where('id',$id)->get();
        $posts = Post::where('category_id', $category->id)->get();
             //dd($post);
             return response()->json([
                'categoria' => $category,
                'articulo'  => $posts
            ]);
    }
    public function cuerpoPost($id){
        $post = Post::where('id',$id)->get();
             //dd($post);
             return response()->json(['Post'=> $post]);
    }


    // //index posts 
    // public function index(){
    //     $post = Post::all();
    //     //dd($post);
    //     return response()->json(['posts'=> $post]);
    // }
    // //show post
    // public function individual($id){
    //     $post = Post::findOrfail($id);
    //     //dd($post);
    //     return response()->json(['post'=> $post]);
    // }

    public function slider(){
        //el  metodo take es para limitar el resultado
        $posts = Post::all()->take(10);
        return response()->json(['Posts' => $posts]);
    }



    public function endpoint(){
        $category = Category::where('id', '4')->latest() ->select(['nombre','description']) ->get();
        $posts = Post::where('category_id', '5')->latest() ->take(3)->select(['title', 'description', 'slug'])->get();
        $category1 = Category::where('id', '3')->latest()->select(['nombre','description'])  ->get();
        $posts1 = Post::where('category_id', '6')->latest()->take(3)->select(['title', 'description', 'slug'])->get();
        $category2 = Category::where('id', '8')->latest()  ->select(['nombre','description'])  ->get();
        $posts2 = Post::where('category_id', '100')->latest()->take(3)->select(['title', 'description', 'slug'])->get();
        //Retorna las categorias
        return response()->json(['categoria' => $category,
            'posts'  => $posts,
                      'categoria' => $category1,
            'posts'  => $posts1,
                        'categoria' => $category2,
            'posts'  => $posts2
        ]);
    }


}
