<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name= "david";
        $user->email= "david.pradomejuto@iesmiguelherrero.com";
        $user->email_verified_at = now();
        $user->password= bcrypt("david");
        $user->remember_token = Str::random(10);
        $user->save();

    }
}
