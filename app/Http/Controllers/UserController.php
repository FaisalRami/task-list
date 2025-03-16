<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{

    public function index(){
        // $users = DB::table('users')->get();
        $users=User::all();
        return view('users' , compact('users'));
    }

    public function adduser(){
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        // DB::table('users')->insert(['name'=>$user_name , 'email'=>$user_email , 'password'=>$user_password]);
        $user=new User;
        $user->name=$user_name;
        $user->email=$user_email;
        $user->password=$user_password;
        $user->save();
        return redirect()->back();
    }

    public function destroyuser($id){
        // DB::table('users')->where('id' , $id)->delete();
        User::find($id)->delete();
        return redirect()->back();
    }

    public function edituser($id){
        // $user = DB::table('users')->where('id' , $id)->first();
        // $users = DB::table('users')->get();
        $user=User::find($id);
        $users=User::all();
        return view('users' , compact( 'user' ,'users'));
    }

    public function updateuser(){
        $id = $_REQUEST['id'];
        // DB::table('users')->where('id' , $id)->update(['name'=>$_POST['name'], 'email'=>$_POST['email'], 'password'=>$_POST['password']]);
        User::where('id' , $id)->update(['name'=>$_REQUEST['name'], 'email'=>$_REQUEST['email'], 'password'=>$_REQUEST['password']]);
        return redirect('users');
    }

}
