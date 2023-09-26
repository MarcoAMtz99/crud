<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;


use App\Models\User;

class UserController extends Controller
{
    //

    public function index(){

        $users = User::all();

        return view('dashboard',['users'=>$users]);
    }


    public function create(){

        return view('users.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        
        $data = $request->all();

        $user =  User::create([
            'name'=>$data['name'],
            'email'=>$data['email'] ,
            'password'=>Hash::make($request->password) ,
        ]);
        return redirect('/dashboard')->with('message','Usuario creado con éxito.');
    }

    public function edit($id){
        $user = User::find($id);
        return view('users.edit',["user"=>$user]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $data = $request->all();
        if($request->password == "" || $request->password == null){
            $user = User::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email']
        ]);
        }else{
            $user = User::where('id',$id)->update([
            'name'=>$data['name'],
            'email'=>$data['email'] ,
            'password'=>Hash::make($request->password),
        ]);
        }
        
        return redirect('/dashboard')->with('message','Usuario actualizado con éxito.');

    }

    public function destroy(Request $request, $id){

        $user = User::find($id);
        $user->delete();
        return redirect('/dashboard')->with('message','Usuario eliminado con éxito.');

    }

      public function createRole(Request $request, $id){

        $user = User::find($id);
        $roles = Role::all();

        return view('users.role',['user'=>$user,"roles"=>$roles]);

    }

    public function storeRole(Request $request,$id){

        $request->validate([
            'role' => ['required'],
        ]);
        
        $data = $request->all();
        $role = Role::where("id",$data['role'])->first();
        $user = User::find($id);
        $user->assignRole($role);
        return redirect('/add-user-role/'.$id)->with('message','Usuario actualizado con éxito, rol asociado.');
    }

    public function removeRole(Request $request,$id){


        $request->validate([
            'role_id' => ['required'],
        ]);
        
        $data = $request->all();
        $role = Role::where("id",$data['role_id'])->first();
        $user = User::find($id);
        $user->removeRole($role);
        return redirect('/add-user-role/'.$id)->with('message','Usuario actualizado con exito, rol eliminado.');
    }

    
}
