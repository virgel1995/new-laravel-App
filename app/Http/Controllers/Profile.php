<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attachment;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user =  new User;
        $user->preference = $request->preference;
        $user->save();
         return redirect('user');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        return view('user.update', compact('user'));
        }

    public function destroy($id)
    {
        //
    }
    public function messages()
    {
        $user = Auth::user();
        return view('user.messages', compact('user'));
}

//update settings
public function updateUserBio(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'preference' => $request->preference
        ]);
        return redirect('user')->with('status', 'Bio Has been Updated successfully');
    }

public function updateUserUsername(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'username' => $request->username
        ]);
        // Auth::logout();
        return redirect('login')->with('status', 'Username Has been Updated successfully');
    }

public function updateUserPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = User::findOrFail(Auth::id());
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return redirect('user')->with('status', 'Password Has been Updated successfully');
    }
public function updateUserEmail(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'email' => $request->email
        ]);
        return redirect('user')->with('status', 'Email Has been Updated successfully');
    }


public function updateUserAvatar(Request $request )
    {
        $user = User::findOrFail(Auth::id());
        $this->validate($request , [
            'avatar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('avatar');
        $image_new_name = time().$image->getClientOriginalName();
        // Attachment::create([
        //     'user_id' => Auth::id(),
        //     'thumb_Url'=> "images/avatars/".$user->email."/".$image_new_name,
        //     'file_Url'=> "images/avatars/".$user->email."/".$image_new_name
        // ]);
        $user->update([
            'avatar' => "images/avatars/".$user->email."/".$image_new_name
        ]);
        $image->move("images/avatars/".$user->email,$image_new_name );

        return redirect('user')->with('success', 'File Has been uploaded successfully')
        ->with('image', $image_new_name);
    }

public function allUsers(){

    $users = User::get();
    return view('user.all', compact('users'));
}

public function onlineUsers(){

    $users = User::select("*")
    ->whereNotNull('last_seen')
    ->orderBy('last_seen', 'DESC')
    ->paginate(10);
    
    return view('user.online', compact('users'));
}




}
