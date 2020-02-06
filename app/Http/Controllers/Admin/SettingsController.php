<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use Up;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.setting');
    }

    public function setting_save()
    {
        $data = $this->validate(request(),
            [
                /* 	 	logo 	icon 	 	 	 	 	 	*/
                'sitename_ar' => 'required|string',
                'sitename_en' => 'required|string',
                'email' => 'required|email',
                'main_lang' => 'required',
                'description' => 'required',
                'keywords' => 'required',
                'status' => 'required',
                'message_mentenance' => 'required',
                'logo' => v_image(),
                'icon' => v_image()
            ]
            , [],
            [
                'logo' => trans('admin.sitelogo'),
                'icon' => trans('admin.siteicon')
            ]
        );
        /*        $data = request()->expect(['_token', '_method']);*/
        if (request()->hasFile('logo')) {
            $data['logo'] = Up::upload([
                'file' => 'logo',
                'path' => 'settings',
                'upload_type' => 'single',
                'delete_file' => sett()->logo,
            ]);
        }
        if (request()->hasFile('icon')) {

            $data['icon'] = Up::upload([
                'file' => 'icon',
                'path' => 'settings',
                'upload_type' => 'single',
                'delete_file' => sett()->icon,
            ]);
        }
        Setting::orderBy('id', 'desc')->update($data);
        session()->flash('success', 'settings has been edit');
        return redirect(aurl('setting'));
    }
}
