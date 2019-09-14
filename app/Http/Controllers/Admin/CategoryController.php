<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use DB;
class CategoryController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
    $categories = Category::orderBy('id','DESC')->paginate(6);
     
    return view('admin.categories.index', compact('categories'));
      
    }

    public function create(){

        return view('admin.categories.create');
    }

    public function store(CategoryStoreRequest $request){
         $category = Category::create($request->all());

         return redirect()->route('categories.edit', $category->id)->with('info', 'Departamento creada con exito');

    }

    public function show($id){
        $category =Category::find($id);

        return view('admin.categories.show',compact('category'));

        
    }

    public function edit($id){

        $category =Category::find($id);

        return view('admin.categories.edit',compact('category'));
    }

    public function update(CategoryUpdateRequest $request,$id){
        $category =Category::find($id);
        $category->fill($request->all())->save();

        return redirect()->route('categories.edit', $category->id)->with('info', 'Departamento actualizada con exito');
    }
    public function destroy($id){

        $category =Category::find($id)->delete();

        return back()->with('info' , 'eliminado correctamente');
    }

    public function indexBorrados(){
          $categories=DB::table('categories')->whereNotNull('deleted_at')->get();

    return view('admin.categories.restablecer', compact('categories'));
    }
    

    public function RestablecerDepto($id){

        $categories=Category::withTrashed()->find($id)->restore();

         return back()->with('info' , 'restablecido correctamente');
    }
}
