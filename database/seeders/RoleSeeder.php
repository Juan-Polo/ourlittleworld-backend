<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role =new Role();
        $role->name ="Maestro";
        $role->save();

        $role2 =new Role();
        $role2->name ="Padre";
        $role2->save();

        $role3 =new Role();
        $role3->name ="Alumno";
        $role3->save();

    }
}
