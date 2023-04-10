<?php

namespace App\Http\Controllers;

use App\Models\Mailsetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    public function index(){
        Artisan::call('down');
        // dd('site maintance hocche');
        return view('backend.Settings.maintance');
    }
    public function maintance(){
        Artisan::call('up');
        return back();
    }

    // public function mailview()
    // {
    //     $mails = Mailsetting::find(1);
    //     return view('backend.Settings.mail',['mails'=>$mails]);
    // }

    // public function update(Request $request, Mailsetting $mailsettings){
    //     $data = $request->validate([
    //         'mail_transport'  =>'required',
    //         'mail_host'       =>'required',
    //         'mail_port'       =>'required',
    //         'mail_username'   =>'required',
    //         'mail_password'   =>'required',
    //         'mail_encryption' =>'required',
    //         'mail_from'       =>'required',
    //     ]);
    //     $mailsettings->update($data);
    //     return redirect()->back()->withSuccess('Mail updated !!!');
    // }

}
