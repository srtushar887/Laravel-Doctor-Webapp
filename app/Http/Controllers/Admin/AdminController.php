<?php

namespace App\Http\Controllers\Admin;

use App\general_setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }


    public function general_settings()
    {
        $gen = general_setting::first();
        return view('admin.pages.generalSettings',compact('gen'));
    }

    public function general_settings_update(Request $request)
    {
        $gen = general_setting::first();
        if($request->hasFile('logo')){
            @unlink($gen->logo);
            $image = $request->file('logo');
            $imageName = uniqid().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $gen->logo = $imgUrl;
        }
        if($request->hasFile('icon')){
            @unlink($gen->icon);
            $image = $request->file('icon');
            $imageName = uniqid().'.'.'png';
            $directory = 'assets/admin/images/logo/';
            $imgUrl2  = $directory.$imageName;
            Image::make($image)->save($imgUrl2);
            $gen->icon = $imgUrl2;
        }


        $gen->site_name = $request->site_name;
        $gen->site_email = $request->site_email;
        $gen->site_phone = $request->site_phone;
        $gen->site_currency = $request->site_currency;
        $gen->address = $request->address;
        $gen->save();

        return back()->with('success','General Settings Successfully Updated');


    }


}
