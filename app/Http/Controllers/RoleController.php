<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
      //

    public function index(){

        $roles = Role::all();

        return view('roles.index',['roles'=>$roles]);
    }


    public function create(){

        return view('roles.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
        $data = $request->all();
        
        if($this->validateRoleName($data['name'],"add")){
         return redirect('/roles')->with('message','Role creado con exito');
        }else{
         return redirect('/add-role')->with('message','Este rol ya existe, por favor verifica que sea diferente.');
        }
  
    }

    public function edit($id){
    
        $role = Role::find($id);
        f($role == null){
         return redirect('/dashboard')->with('message','Rol invalido.');
        }
        return view('roles.edit',["role"=>$role]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $data = $request->all();

        if($this->validateRoleName($data['name'],"edit",$id)){
         return redirect('/roles')->with('message','Role actualizado con exito');
        }else{
        return redirect('/edit-role/'.$id)->with('message','Este rol ya existe, por favor verifica que sea diferente.');
        }

    }

    public function destroy(Request $request, $id){

        $role = Role::find($id)->delete();
        return redirect('/roles')->with('message','Role eliminado con éxito.');

    }


    public function validateRoleName(String $string,$type,$id = null){

        $exist = Role::where("name",'like',"%".$string."%")->first();

        if( $exist ){

            if($type ==="add"){
                 return false;
            }

             if($type === "edit"){
                 return false;
            }
        }else{

            if($type ==="add"){
                 $role =  Role::create([
                 'name'=>$string,
                  ]);
                return true;
            }

            if($type ==="edit"){
                $role = Role::where('id',$id)->update([
                'name'=>$string,
                ]);
                return true;
            }

        }
    }
}
