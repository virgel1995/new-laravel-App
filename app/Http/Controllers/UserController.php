<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Chatify\Facades\ChatifyMessenger as Chatify;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function ip_details()
    {
        // $ip = '127.0.0.1'; //For static IP address get
        $ip = request()->ip();
        // dd($ip);
        $data = \Location::get($ip);
        // return view('details',compact('data'));
    }

    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }
    public function privte()
    {
        $user = Auth::user();
        return view('user.privte', compact('user'));
    }

    public function send(Request $request)
    {
        // default variables
        $error = (object)[
            'status' => 0,
            'message' => null
        ];
        $attachment = null;
        $attachment_title = null;

        // if there is attachment [file]
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
            // if size less than 150MB
            if ($file->getSize() < 150000000) {
                if (in_array($file->getClientOriginalExtension(), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $file->storeAs("public/" . config('chatify.attachments.folder'), $attachment);
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File extension not allowed!";
            }
        }

        if (!$error->status) {
            // send to database
            $messageID = mt_rand(9, 999999999) + time();
            Chatify::newMessage([
                'id' => $messageID,
                'type' => $request['type'],
                'from_id' => Auth::user()->id,
                'to_id' => $request['id'],
                'body' => htmlentities(trim($request['message']), ENT_QUOTES, 'UTF-8'),
                'attachment' => ($attachment) ? json_encode((object)[
                    'new_name' => $attachment,
                    'old_name' => htmlentities(trim($attachment_title), ENT_QUOTES, 'UTF-8'),
                ]) : null,
            ]);

            // fetch message to send it with the response
            $messageData = Chatify::fetchMessage($messageID);

            // send to user using pusher
            Chatify::push('private-chatify', 'messaging', [
                'from_id' => Auth::user()->id,
                'to_id' => $request['id'],
                'message' => Chatify::messageCard($messageData, 'default')
            ]);
        }

        // send the response
        return Response::json([
            'status' => '200',
            'error' => $error,
            'message' => Chatify::messageCard(@$messageData),
            'tempID' => $request['temporaryMsgId'],
        ]);
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
        $countries = Country::all();
        return view('user.edit', compact('user', 'countries'));
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

    public function updateUserCountry(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'country' => $request->country
        ]);
        return redirect()->route('user.edit')->with('status', 'Bio Has been Updated successfully');
    }


    public function updateUserUsername(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update([
            'username' => $request->username
        ]);
        // Auth::logout();
        return redirect()->route('user.edit')->with('alert', 'Updated!')->with('status', 'Username Has been Updated successfully');
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
        return redirect()->route('user.edit')->with('status', 'Email Has been Updated successfully');
    }


    public function updateUserAvatar(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        // $this->validate($request, [
        //     'avatar'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        // ]);

        $attachment = null;
        $attachment_title = null;

        // if there is attachment [file]
        if ($request->hasFile('file')) {
            // allowed extensions
            $allowed_images = Chatify::getAllowedImages();
            $allowed_files  = Chatify::getAllowedFiles();
            $allowed        = array_merge($allowed_images, $allowed_files);

            $file = $request->file('file');
            // if size less than 150MB
            if ($file->getSize() < 150000000) {
                if (in_array($file->getClientOriginalExtension(), $allowed)) {
                    // get attachment name
                    $attachment_title = $file->getClientOriginalName();
                    // upload attachment and store the new name
                    $attachment = Str::uuid() . "." . $file->getClientOriginalExtension();
                    $file->storeAs("public/" . config('chatify.attachments.folder'), $attachment);
                } else {
                    $error->status = 1;
                    $error->message = "File extension not allowed!";
                }
            } else {
                $error->status = 1;
                $error->message = "File extension not allowed!";
            }
        }

        return redirect()->route('user.edit')->with('success', 'File Has been uploaded successfully');
    }

    public function allUsers()
    {
        $users = User::get();
        return view('user.all', compact('users'));
    }

    public function onlineUsers()
    {
        $users = User::select("*")
    ->whereNotNull('last_seen')
    ->orderBy('last_seen', 'DESC')
    ->paginate(10);

        return view('user.online', compact('users'));
    }
}
