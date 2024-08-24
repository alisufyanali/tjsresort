<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\EmailSetting;
use App\Models\User;

class EmailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();

        foreach ($users as $user) {
            EmailSetting::create([
                'user_id' => $user->id,
                'mail_driver' => 'smtp',
                'mail_host' => 'mail.pansariinn.pk',
                'mail_port' => 587,
                'mail_username' => 'dev@pansariinn.pk',
                'mail_password' => 'Admin123!@@!',
                'mail_encryption' => 'tls',
                'mail_from_address' => $user->email,
                'mail_from_name' => $user->name,
            ]);
        }
    }
}
