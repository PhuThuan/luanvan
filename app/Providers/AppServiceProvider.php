<?php

namespace App\Providers;

use App\Mail\SendMail;
use App\Models\SendMailModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config; // Add this line

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('mailsettings')) {
            $mailsetting = SendMailModel::first();
            if ($mailsetting) {
                $data = [
                    'driver'            => $mailsetting->mail_transport,
                    'host'              => $mailsetting->mail_host,
                    'port'              => $mailsetting->mail_port,
                    'encryption'        => $mailsetting->mail_encryption,
                    'username'          => $mailsetting->mail_username,
                    'password'          => $mailsetting->mail_password,
                    'from'              => [
                        'address' => $mailsetting->mail_from,
                        'name'   => 'EASY'
                    ]
                ];
                Config::set('mail', $data);
            }
        }
    }
}
