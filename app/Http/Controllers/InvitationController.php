<?php

namespace App\Http\Controllers;

use App\Invitation;
use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;

class InvitationController extends Controller
{
    public function index()
    {
        return view('invitation.create');
    }

    public function create(Request $request)
    {
        $token = Str::random(80);

        $invitation = new Invitation;
        $invitation->email = $request->email;
        $invitation->token = Hash::make($token);
        $invitation->family_id = Auth::user()->family_id;
        $invitation->save();

        return view('invitation.store', ['token' => $token, 'email' => $request->email]);
    }

    public function recieve(string $token)
    {
        $invitation = Invitation::get();

        foreach ($invitation as $i) {
            if (Hash::check($token, $i->token)) {
                return view('invitation.recieve', ['token' => $token]);
            }
        }
    }

    public function register(Request $request)
    {
        $invitation = Invitation::where('email', $request->email)->get();
        foreach ($invitation as $i) {
            if (Hash::check($request->token, $i->token)) {
                $user = new User;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->family_id = $i->family_id;
                $user->password = Hash::make($request->password);
                $user->save();

                Auth::login($user);

                return redirect('/')->with('flash_message', '招待を承諾しました！');
            }
        }
    }
}
