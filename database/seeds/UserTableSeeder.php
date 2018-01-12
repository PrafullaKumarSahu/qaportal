<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = Role::where('name', 'student')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $student = new User();
        $student->name = 'Student';
        $student->email = 'student@example.com';
        $student->password = bcrypt('secret');
        $student->save();
        $student->roles()->attach($role_student);

        $manager = new User();
        $manager->name = 'Admin';
        $manager->email = 'admin@example.com';
        $manager->password = bcrypt('secret');
        $manager->save();
        $manager->roles()->attach($role_admin);
    }
}
