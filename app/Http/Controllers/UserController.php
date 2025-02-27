<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Freind;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    public function create(){
        return view('register');
    }
    public function store(Request $request){
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        return redirect()->route('user.login');
    }
    public function showLoginForm(){
        return view('login');
    }
    public function login(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('user.Home'); 
        }
        else{
            echo '...';
        }
    }
    public function index(Request $request){
        $search = $request->input('search');
        if($search){
            $users = User::where('pseudo','like','%'. $search  .'%')->orWhere('email','like','%'.$search.'%')->get();
        }
        else{
            $AuthenticatedId = Auth::id();
            $users = User::where('id','!=',$AuthenticatedId)->get();
            }
        return view('users.index', compact('users')); 
    }
    public function showProfile($userId){
        $user = User::find($userId);
        $AuthenticatedId = Auth::id();
        return view('users.UserProfile', compact('user','AuthenticatedId'));
    }
    public function showEditProfile($userId){
        $user = User::find($userId);
        return view('users.EditProfile',compact('user'));
    }
    public function updateProfile(Request $request,$id){
        $user = User::findOrFail($id);
        // dd($user);
 // handle the profile image upload
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $imagePath = $request->file('image')->storeAs('avatar', $imageName, 'public');

            $user->image = $imagePath;
        };
        $user->update([
            'name'=>$request->name,
            'firstname'=>$request->first,
            'pseudo'=>$request->pseudo,
            'bio'=>$request->bio,
        ]);

        return redirect()->route('USERPROFILE',['userId'=>$user->id]);
    }
}
