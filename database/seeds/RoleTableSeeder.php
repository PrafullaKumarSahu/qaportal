<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
	    $role_admin->name = 'admin';
	    $role_admin->description = 'An Admin';
	    $role_admin->save();

	    $role_student = new Role();
	    $role_student->name = 'student';
	    $role_student->description = 'A Student';
	    $role_student->save();
    }
}
