<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Redirect;
use Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('permission:edit_usuarios',   ['only' => ['edit']]);
        $this->middleware('permission:ver_usuarios',   ['only' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('id','<>',\Auth::user()->id)->paginate(10);

       return view('content.users.users_list',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'email.unique' => 'El :attribute  ya existe en otra cuenta.',
            'email.required' => 'El :attribute es requerido.',
            
        ];
        $validator = Validator::make($request->all(), [
            'email' => [
                    'required','unique:users'   
                ]                
            ],$messages); 

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'direccion' => $request['direccion'],
            'telefono' => $request['telefono'],
            'password' => Hash::make($request['password']),
        ]);

        if($request->get('dependencia_id')){
            $user->dependencias()->attach($request->dependencia_id);
        }
        if($request->get('rol_id')){
            $user->roles()->attach($request->rol_id);
        }

        return redirect()->back();

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
        $user = User::find($id);
        if($id != auth()->user()->id and !auth()->user()->can('edit_usuarios')){
            abort(403);
        }
        return view('content.users.user_edit',compact('user'));
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
        $user = User::find($id);
        if(!$request->ajax()){
            $messages = [
                'email.unique' => 'El :attribute  ya existe en otra cuenta.',
                'email.required' => 'El :attribute es requerido.',
                
            ];
            $validator = Validator::make($request->all(), [
                'email' => [
                  'required',
                    Rule::unique('users')->ignore($user->id)
                ],
                    
                ],$messages); 
    
            if ($validator->fails()) {
                return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }

        }
        $user->fill($request->all());
        if($request->get('dependencia_id')){
            $user->dependencias()->sync($request->dependencia_id);
        }
        if($request->get('rol_id')){
            $user->roles()->sync($request->rol_id);
        }
        if($request->get('password')){
            $user->password = bcrypt($request->password);
        }
        $user->save();
        if($request->ajax()){
            return response()->json(['reload'=>true]);
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
       return $id;
    }
}
