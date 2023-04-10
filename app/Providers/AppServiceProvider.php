<?php

namespace App\Providers;

use App\Models\Mailsetting;
use Illuminate\Support\ServiceProvider;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $mailsettings = Mailsetting::first();
        if($mailsettings){
            $data = [
            'host' => $mailsettings->mail_host,
            'port' => $mailsettings->mail_port,
            'encryption' => $mailsettings->mail_encryption,
            'username' => $mailsettings->mail_username,
            'password' => $mailsettings->mail_password,
            'from'=>[
                'address'=>$mailsettings->mail_from,
                'name'=>'laravelmail'
             ]
            ];
            Config::set('mails', $data);;
        }
    }
}
