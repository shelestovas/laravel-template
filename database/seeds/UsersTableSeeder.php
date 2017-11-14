<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Sentinel::registerAndActivate([
            'name'     => 'Администратор',
            'email'    => 'shelestov.a.s@gmail.com',
            'password' => 'secret'
        ]);

        $admin_role = Sentinel::findRoleBySlug('superadmin');

        \Log::info(print_r($admin_role, true));

        $admin_role->users()->attach($admin);

        $editor = Sentinel::registerAndActivate([
            'name'     => 'Редактор',
            'email'    => 'djdell@yandex.ru',
            'password' => 'secret'
        ]);

        $editor_role = Sentinel::findRoleBySlug('editor');

        $editor_role->users()->attach($editor);
    }
}
