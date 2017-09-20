<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Http\Requests\UserRequest;
/*
* Cuando queremos crear un controlador con una serie de acciones colocamos la siguente instruccion
    
    --> php artisan make:controller UsersController --resource

*/

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $users = User::orderBy('id', 'DESC')->paginate(5);
        /*
        * Pasar datos a una vista, tenemos dos formas:
        Primera es pasar la variable a la vista asi: view('admin.users.index', $users) .
        Segunda es utilizar with el cual se recomienda para ello se pasan dos parametros el
        primero se define el nombre de la varaible que vamos a utilizar en la vista y en el 
        segundo parametro se pasa la varaible, se denota así: view('admin.users.index')->with('[nombre de la nueva variable], [variable]').
        */
        //dd($users);
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('Hola es un mensaje');
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
    * request --> lo que es tomar los datos de un formulario para luego pasarlo a un objeto
    * nosotros podemos crear nuestros propios request y validarlos para ello utilizamos la siguiente instrucción ademas lo horemos para el user: php artisan make:request UserRequest
    */
    //public function store(Request $request)
    /*
    * UserRequest --> lo que estamos indicando es que usaremos nuestro propio request
    * Si queremos mostrar los errores en la misma pantalla que estamos utilizando entonces 
    jugamos con la variable error como se muestra en el template create.blade.php
    */
    public function store(UserRequest $request)
    {
        //dd('Exitoso');
        //dd($request->all());
        $user = new User($request->all());
        /*
        * La contraseña la debemos encriptar y para ello lo hacemos de la siguiente manera
        */
        $user->password = bcrypt($request->password);
        $user->save();
        //dd('Usuario Creado');
        /*
        * Para redireccionar utilizamos la siguiente instruccion redirect()->route
        * o tambien lo puedo hacer redirect('admin/users') para pasar parametros y manejar el tema de mensajes
        */
        $mensaje = "Se ha registrado a ".$user->name. " exitosamente :)";
        $tipo = "success";

        //return redirect()->route('admin.users.index', $mensaje);
        return redirect('admin/users')->with('mensaje',$mensaje)->with('tipo',$tipo);
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
    public function edit($id)
    {
        $user = User::Find($id);
        return view('admin.users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->all());
        //dd($id);
        $user = User::find($id);        
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->type     = $request->type;
        /*
        * Otra forma de hacer lo mismo es usando el metodo fill, su aplicación sería de la
        siguiente manera:
        $user->fill($request->all()) 
        */
        /*
        dd($user);
        */
        $user->save();

        $mensaje = "El usuario ".$user->name. " a sido editado con éxito :)";        
        $tipo = "info";
        return redirect('admin/users')->with('mensaje',$mensaje)->with('tipo',$tipo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $mensaje = "El usuario ".$user->name. " a sido borrado de forma exitosamente :)";        
        $tipo = "danger";
        return redirect('admin/users')->with('mensaje',$mensaje)->with('tipo',$tipo);
    }
}
