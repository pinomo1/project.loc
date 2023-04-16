<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function newPFP(Request $request){
        $request->validate([
            'pfp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user = $request->user();
        if($user->avatar != 'storage/pfp/default.png'){
            $user->avatar = str_replace('storage', 'public', $user->avatar);
            Storage::delete($user->avatar);
        }
        $user->avatar = $request->file('pfp')->store('public/pfp');
        $user->avatar = str_replace('public', 'storage', $user->avatar);
        $user->save();
        return back()->with('status', 'pfp-updated');
    }

    public function resetPFP(Request $request){
        $requestuser = $request->user();
        $user = User::where('id', $request->id)->first();
        if($requestuser->id != $user->id){
            if(!$requestuser->isAdmin()){
                return back()->with('status', 'pfp-reset-failed');
            }
        }
        if($user->avatar != 'storage/pfp/default.png'){
            $user->avatar = str_replace('storage', 'public', $user->avatar);
            Storage::delete($user->avatar);
        }
        $user->avatar = 'storage/pfp/default.png';
        $user->save();
        return back()->with('status', 'pfp-reset');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
