<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Category;
use App\User;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
class PostController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
    $posts = Post::orderBy('id','DESC')
    ->where('user_id', auth()->user()->id)
    ->paginate(7);
     
    return view('admin.posts.index', compact('posts'));
      
    }

    public function todos(){
    $posts = Post::orderBy('id','DESC')->paginate(7);
     
    return view('admin.posts.index', compact('posts'));
      
    }

    public function create(){
        $tags=Tag::orderBy('name','ASC')->get();
        $idDepto=User::where('id','=',auth()->user()->id)->pluck('idDepto');
        $departamento=Category::find($idDepto);

        return view('admin.posts.create',compact('tags','departamento'));
    }

    public function store(PostStoreRequest $request){
         $post = Post::create($request->all());

         //imagen

         if($request->file('file')){

             $path =Storage::disk('public')->put('image', $request->file('file'));

             $post->fill(['file'=> asset($path)])->save();

         }
          
          $post->tags()->sync($request->get('tags'));



         return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada creada con exito');

    }

    public function show($id){
        $post =Post::find($id);

        return view('admin.posts.show',compact('post'));

        
    }

    public function edit($id){
         $tags=Tag::orderBy('name','ASC')->get();
        $idDepto=User::where('id','=',auth()->user()->id)->pluck('idDepto');
        $departamento=Category::find($idDepto);
        $post =Post::find($id);

        return view('admin.posts.edit',compact('post','tags','departamento'));
    }

    public function update(PostUpdateRequest $request,$id){
        $post =Post::find($id);
        $post->fill($request->all())->save();

      if($request->file('file')){

             $path =Storage::disk('public')->put('image',$request->file('file'));

             $post->fill(['file'=> asset($path)])->save();

         }
          
          $post->tags()->sync($request->get('tags'));


          
         return redirect()->route('posts.edit', $post->id)->with('info', 'Entrada actualizada con exito');

    }
    

    public function destroy($id){

        $post =Post::find($id)->delete();

        return back()->with('info' , 'eliminado correctamente');
    }


//funciones del slider interno
    public function mover_a_slider($id){

          $slider =Post::find($id);

          $slider->slider='1';

          $slider->save();



     return back()->with('info' , 'Post agregado a slider');

    }

    public function quitar_a_slider($id){

          $slider =Post::find($id);

          $slider->slider='0';

          $slider->save();

 return back()->with('info' , 'Post quitado de slider');

     
    
}

public function mostrar_slider(){

        $posts = Post::orderBy('id','DESC')
    ->where('slider','1')
    ->paginate(6);

    return view('admin.slider.index',compact('posts'));

}

//funcion de borrado logico
public function indexBorrados(){
          $posts=DB::table('posts')->whereNotNull('deleted_at')->get();

    return view('admin.posts.restablecer', compact('posts'));
    }
    

    public function RestablecerPost($id){

        $posts=Post::withTrashed()->find($id)->restore();

         return back()->with('info' , 'restablecido correctamente');
    }



    // funciones del slider publico

    public function mover_a_slider_publico($id){

          $slider =Post::find($id);

          $slider->publico='SI';

          $slider->save();

 return back()->with('info' , 'Post agregado a slider publico');

     
    
}

public function quitar_a_slider_publico($id){

          $slider =Post::find($id);

          $slider->publico='NO';

          $slider->save();

 return back()->with('info' , 'Post quitado de slider publico');

     
    
}
public function mostrar_slider_publico(){

        $posts = Post::orderBy('id','DESC')
    ->where('publico','SI')
    ->paginate(6);

    return view('admin.slider.slider_publico',compact('posts'));

}


}