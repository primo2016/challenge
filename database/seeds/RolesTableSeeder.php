<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Storage::disk('public')->deleteDirectory('posts');
        Role::truncate();

        $role = new Role;

        $role->name = 'admin';
        $role->display_name = 'Administrador';
        $role->description = 'Administrador del Sitio';

        $role->save();

        $user = User::first();

        DB::table('assigned_roles')->truncate();
        DB::table('assigned_roles')->insert([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
    }
}
