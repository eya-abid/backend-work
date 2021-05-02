<?php

namespace App\Http\Controllers;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\QueryBuilder;


class UserController extends Controller
{
    public function register(Request $request) {

    $user = User::where('email', $request['email'])->first();

    if($user) {
        $response['status'] =0;
        $response['message'] = 'Email already exists';
        $response['code'] = 409;
    } else {
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]

        );

        $response['status'] =1;
        $response['message'] = 'Registred Successfully';
        $response['code'] = 200;
    }
        return response()->json($response);

    }

    public function login(Request $request){
        $credentials = $request->only('email','password');
        try{
            if(!JWTAuth::attempt($credentials)){
            $response['status'] = 0;
            $response['data'] = null;
            $response['code'] = 401;
            $response['message'] = 'Email or Password is incorrect';

            return response()->json($response);

            }
        } catch(JWTException $e){
            $response['data'] = null;
            $response['code'] = 500;
            $response['message'] = 'Could not create token';

            return response()->json($response);


        }

        $user = auth()->user();
        $data['token'] = auth()->claims([
            'user_id'=> $user->id,
            'email' => $user->email
        ]) ->attempt($credentials);

        $response['data'] = $data;
        $response['status'] = 1;
        $response['code'] = 200;
        $response['message'] = 'Login successful';

        return response()->json($response);

    }

    function search(){
        $users = DB::select('select * from users');

       dd($users);

}

function show($id){
   
return $id; 
}

function index(){
return;
}
}

