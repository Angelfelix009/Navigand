<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user= new Admin();
        $user->name='Olajide Felix O';
        $user->email='olajide.felix@yahoo.com';
        $user->password=bcrypt('111111');
        $user->role_id=5;
        $user->status =1;
        $user->save();
    }
}
