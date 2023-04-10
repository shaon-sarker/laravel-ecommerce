<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mailsetting;

class MailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mailsetting::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'2525',
            'mail_username'             =>'d7492598986343',
            'mail_password'             =>'7283788ed1d724',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'shaonadmin@gmail.com',
        ]);
    }
}
