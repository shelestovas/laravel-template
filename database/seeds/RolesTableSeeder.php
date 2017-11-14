<?php

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
        $role = new \App\Role();
        $role->slug = 'superadmin';
        $role->name = 'Супер Администратор';
        $role->permissions = [
            '*' => true
        ];
        $role->save();

        $role = new \App\Role();
        $role->slug = 'editor';
        $role->name = 'Редактор';
        $role->permissions = [
            'admin.panel' => true,
            'admin.dashboard' => true,
        ];
        $role->save();
    }
}
