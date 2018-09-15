<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
	public function edit()
	{
		return view('admin.profile.edit');
	}
	public function uppdate()
	{
		return redirect('admin/profile/edit');
	}
}
