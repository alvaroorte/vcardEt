<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
 

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        $cantidad = $users->Count();
        return view('Users.listUsers',compact('users','cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ruta = "users.store";
        $accion = "Crear Usuario";
        $roles = Role::all();
        return view('Users.formUser', ['ruta' => $ruta, 'accion' => $accion, 'type' => "create", 'user' => "", 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if ($req->id)
            $user = User::find($req->id);
        else 
            $user = new User();
            
        if ($req->password) {
            $req->validate([
                'password' => ['required', 'confirmed', Password::min(8)]
            ]);
            $user->password = bcrypt($req->password);
        } 

        
        $user->name = $req->name;
        $user->email = $req->email;
        $user->save();

        $user->syncRoles($req->roles);
        return redirect()->route('users.index');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $ruta = "users.store";
        $accion = "Editar Usuario";
        $roles = Role::all();
        return view('Users.formUser', ['ruta' => $ruta, 'accion' => $accion, 'type' => "edit", 'user' => $user, 'roles' => $roles]);
    }

    public function update(Request $req, USer $user)
    {
        $userData = User::find($user->id);
        // dd($req);
        $userData->name = $req->name;
        $userData->email = $req->email;
        if ($req->password) {
            $userData->password = bcrypt($req->password);
        }
        $userData->save();
        $user->syncRoles($req->roles);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
