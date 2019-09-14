<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use\App\Archivo;

use App\Http\Requests\ArchivoStoreRequest;
use App\Category;
use App\User;

use Illuminate\Support\Facades\Storage;

class ArchivosController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
    $archivos = Archivo::orderBy('id','DESC')
    ->where('user_id', auth()->user()->id)
    ->paginate(6);
     
    return view('Files.index', compact('archivos'));
      
    }

    public function create(){
      
        $idDepto=User::where('id','=',auth()->user()->id)->pluck('idDepto');
        $departamento=Category::find($idDepto);

        return view('Files.create',compact('departamento'));
    }

    public function store(ArchivoStoreRequest $request){
         $archivo = Archivo::create($request->all());

         //imagen

         if($request->file('file')){

             $path =Storage::disk('public')->put('image', $request->file('file'));

             $archivo->fill(['file'=> asset($path)])->save();

         }
          

         return redirect()->route('archivos.index');

    }

    

  
    public function destroy($id){

        $archivo =Archivo::find($id)->delete();

        return back()->with('info' , 'eliminado correctamente');
    }
    
}
