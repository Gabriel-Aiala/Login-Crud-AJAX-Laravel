<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Requests\UserStoreRequest;
use  Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(UserRepository $userRepository) 
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        return view('login');
    } 
    public function login(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = User::where('email', $email)->first();
        Auth::login($user);
        $login['success'] = true;
        echo json_encode($login);
    } else {
        $login['success'] = false;
        $login['message'] = 'Email ou senha incorretos';
        echo json_encode($login);
    }
}
    public function userForm()
    {
        return view('userForm');
    }
    public function listUsers()
    {
        $users=$this->userRepository->buscarTodosUsuarios();
        return view('listUsers')->with(['users'=>$users]);
    }
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
      
        if ($validator->fails()) {
            return response()->json([
                'error' => $request->all()
            ]);
        }
           
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
      
        return response()->json(['success' => 'Post created successfully.']);
    }
    



    public function destroy($id)
    {
        $user = $this->userRepository->buscarUsuario($id);
        if ($user)
        {
            $user->delete();
            $users= $this->userRepository->buscarTodosUsuarios();
            return view('listUsers')->with(['users'=>$users]);
        }else
        {
            return response()->json('nenhum usuario foi encontrado', 404);
        }
    }
    public function update(Request $request )
    {
        
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
      
        if ($validator->fails()) {
            return response()->json([
                'error' => $request->all()
            ]);
        }
        $user = $this->userRepository->buscarUsuarioEmail($request->email);
     
        $user->update($request->all());
        
      
        return view('edit')->with('user',$user);
    }
    public function edit($id)
    {
        $user = $this->userRepository->buscarUsuario($id);
        return view('edit')->with('user',$user);
    }
}
