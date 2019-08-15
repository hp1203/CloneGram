<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\User; //<<< importing right here

class ProfileController extends Controller
{
    public function index(User $user)
    {
        // Can be done like this as well
        // $user = User::findOrFail($user);
        // return view('profiles.index', [
        //     'user'=>$user
        // ]);
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id ) : false;

        $postsCount = $user->posts->count();
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();

        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user) {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        if(request('image')) {
            $imagePath = request('image')->store('profile', 'public');
        
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        //array_merg() is a php function that will replace $data['image'] with second array's image key value.
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
