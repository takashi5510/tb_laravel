<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        return view('admin.profile.edit', ['old' => $profile]);
    }
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);

        $profile_id = $request->id;
        if ($profile_id) {
            $profile = Profile::find($profile_id);
        } else {
            $profile = new Profile;
        }
        $old = $request->all();

        unset($old['_token']);
        $profile->fill($old)->save();
        return redirect("admin/profile/edit?id=$profile->id");
    }
}
