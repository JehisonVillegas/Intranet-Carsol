<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use App\Archivo;
use App\Tag;
class PageController extends Controller
{

    

    public function blog(){
        $departamentos=Category::all();
        $post=Post::orderBy('id' ,'DESC')->paginate(10);// el nnumero 8 representa los post que se veran en el slider 

        return view('Web.posts', compact('post','departamentos'));
    }
    //

    public function verTodos(){
        $this->middleware('auth');

        $departamentos=Category::all();
        $posts=Post::orderBy('id' ,'DESC')->paginate(5);
        return view('Web.allPosts', compact('posts','departamentos'));
    }



    public function post($slug){
        $post= Post::where('slug',$slug)->first();

        return view('Web.post',compact('post'));


    }

    public function departamento($slug){
          $category = Category::where('slug',$slug)->pluck('id')->first();
          $namecategory = Category::where('slug',$slug)->pluck('name')->first();
          $posts=Post::where('category_id',$category)->
          orderBy('id' ,'DESC')->paginate(5);

          return view('Web.Post_Depto',compact('posts','category','namecategory'));


    }

    public function etiqueta($slug){


          $posts=Post::whereHas('tags',function($query) use($slug){
            $query->where('slug',$slug);
          })-> orderBy('id' ,'DESC')->paginate(5);

          $nombreTag=Tag::where('slug',$slug);

          return view('Web.Post_Depto_tag',compact('posts','nombreTag'));

    }
    public function ArchivoDepto($id){

      $departamento=Category::where('id',$id)->pluck('name')->first();

       $archivos = Archivo::orderBy('id','DESC')
    ->where('category_id',$id)
    ->paginate();
     
    return view('Files.archivosDepto', compact('archivos','departamento'));
    

    }

}
