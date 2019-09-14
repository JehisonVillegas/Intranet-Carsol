<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use DB;

class UsuarioController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){
    $users = User::orderBy('id','DESC')->paginate(6);
     
    return view('admin.users.index', compact('users'));
      
    }

    public function create(){

        return view('admin.users.create');
    }

    

    public function show($id){
        $user =User::find($id);
        $idDepto=User::where('id','=',$id)->pluck('idDepto');
        $departamento=Category::where('id',$idDepto);

        return view('admin.users.show',compact('user','departamento'));

        
    }

    public function showMisDatos(){
        $user =User::find(auth()->user()->id);
        $idDepto=User::where('id','=',auth()->user()->id)->pluck('idDepto');
        $departamento=Category::where('id',$idDepto);

        return view('admin.users.show',compact('user','departamento'));

        
    }

    public function edit($id){

        $user =User::find($id);

        return view('admin.users.edit',compact('user'));
    }

    public function update(UserUpdateRequest $request,$id){
        $user =User::find($id);
        $user->fill($request->all())->save();

        return redirect()->route('Usuario.edit', $user->id)->with('info', 'Etiqueta actualizada con exito');
    }


    public function destroy($id){

        $user =User::find($id)->delete();

        return back()->with('info' , 'eliminado correctamente');
    }
    



//funciones de borrado logico

    public function indexBorrados(){
          $users=DB::table('users')->whereNotNull('deleted_at')->get();

    return view('admin.users.restablecer', compact('users'));
    }
    

    public function RestablecerUser($id){

        $users=User::withTrashed()->find($id)->restore();

         return back()->with('info' , 'restablecido correctamente');
    }
}
