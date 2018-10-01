<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //
    public function edit()
    {
        return view('admin.profile.edit');
    }
    public function update(Request $request)
    {
        $this->validate($request, Profile::$rules);
        $profile = new Profile;
        $form = $request->all();

        unset($form['_token']);
        $profile->fill($form);
        $profile->save();
        return redirect('admin/profile/edit');
    }
}
