<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'slug'        => 'admin.users.index',
                'name'        => 'Просмотр всех пользователей',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.store',
                'name'        => 'Создание пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.create',
                'name'        => 'Страница создания пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.update',
                'name'        => 'Обновление пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.destroy',
                'name'        => 'Удаление пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.show',
                'name'        => 'Просмотр пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.edit',
                'name'        => 'Страница редактирования пользователя',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.index',
                'name'        => 'Просмотр всех ролей',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.store',
                'name'        => 'Создание роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.create',
                'name'        => 'Страница создания роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.destroy',
                'name'        => 'Удаление роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.update',
                'name'        => 'Обновление роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.show',
                'name'        => 'Просмотр роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.role.edit',
                'name'        => 'Страница редактирования роли',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.index',
                'name'        => 'Просмотр всех разрешений',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.create',
                'name'        => 'Страница создания разрешения',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.store',
                'name'        => 'Создание разрешения',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.edit',
                'name'        => 'Страница редактирования разрешения',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.update',
                'name'        => 'Обновление разрешения',
                'description' => null
            ],
            [
                'slug'        => 'admin.permissions.destroy',
                'name'        => 'Удаление разрешения',
                'description' => null
            ],
            [
                'slug'        => 'admin.profile',
                'name'        => 'Страница профиля',
                'description' => null
            ],
            [
                'slug'        => 'admin.profile.update',
                'name'        => 'Обновление профиля',
                'description' => null
            ],
            [
                'slug'        => 'admin.panel',
                'name'        => 'Доступ к админ панели',
                'description' => null
            ],
            [
                'slug'        => 'admin.users.settings.*',
                'name'        => 'Настройки авторизации и регистрации',
                'description' => null
            ],
            [
                'slug'        => 'admin.dashboard',
                'name'        => 'Просмотр рабочего стола',
                'description' => null
            ],
        ];

        foreach ($permissions as $permission) {
            $perm = new \App\Permission();
            $perm->slug = $permission['slug'];
            $perm->name = $permission['name'];
            $perm->description = $permission['description'];
            $perm->save();
        }
    }
}
