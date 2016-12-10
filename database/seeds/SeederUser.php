<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new_user = [
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ];

        $user = User::create($new_user);
    }
}
