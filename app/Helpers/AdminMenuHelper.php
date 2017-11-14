<?php
namespace App\Helpers;

use Cartalyst\Sentinel\Users\UserInterface;

class AdminMenuHelper
{

    public static function generateMainAdminMenu(UserInterface $user = null)
    {
        if ($user == null)
            $user = \Sentinel::getUser();

        \Menu::make('MainAdminMenu', function ($menu) {
            $menu->add('Консоль', ['route' => 'admin.dashboard'])
                ->prepend('<i class="icon-home4"></i><span>')
                ->append('</span>');

            $menu->add('Пользователи')
                ->prepend('<i class="icon-people"></i><span>')
                ->append('</span>')
                ->nickname('admin_users')
                ->active(parse_url(route('admin.users.index'))['path'] . '/*');
            $menu->admin_users->add('Список пользователей', ['route' => 'admin.users.index'])
                ->data('permission', 'admin.users.index');
            $menu->admin_users->add('Добавить пользователя', ['route' => 'admin.users.create'])
                ->data('permission', 'admin.users.create');
            $menu->admin_users->add('Настройки', ['route' => 'admin.users.settings.auth'])
                ->data('permission', 'admin.users.settings.*')
                ->active(parse_url(route('admin.users.index'))['path'] . '/settings/*');

            $menu->add('Роли пользователей')
                ->prepend('<i class="icon-users"></i><span>')
                ->append('</span>')
                ->nickname('admin_roles')
                ->active(parse_url(route('admin.role.index'))['path'] . '/*');
            $menu->admin_roles->add('Список ролей', ['route' => 'admin.role.index'])
                ->data('permission', 'admin.role.index');
            $menu->admin_roles->add('Добавить роль', ['route' => 'admin.role.create'])
                ->data('permission', 'admin.role.create');

            $menu->add('Операции пользователей')
                ->prepend('<i class="icon-collaboration"></i><span>')
                ->append('</span>')
                ->nickname('admin_permissions')
                ->active(parse_url(route('admin.permissions.index'))['path'] . '/*');
            $menu->admin_permissions->add('Список разрешений', ['route' => 'admin.permissions.index'])
                ->data('permission', 'admin.permissions.index');
            $menu->admin_permissions->add('Добавить разрешение', ['route' => 'admin.permissions.create'])
                ->data('permission', 'admin.permissions.create');

        })->filter(function ($item) use ($user) {
            if($item->hasChildren()) {
                $item->data('children', true);
            }
            if (!empty($item->data('permission'))) {
                if ($user->hasAccess($item->data('permission'))) {
                    return true;
                }
                return false;
            } else {
                return true;
            }
        })->filter(function ($item) {
            if($item->data('children') && !$item->hasChildren() && !$item->hasParent())
                return false;
            return true;
        });
    }

}