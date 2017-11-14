<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push('Консоль', route('admin.dashboard'));
});

\Breadcrumbs::register('admin.profile', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Профиль', route('admin.profile'));
});
/**
 * Для списка пользователей
 */
\Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Список пользователей', route('admin.users.index'));
});

\Breadcrumbs::register('admin.users.show', function ($breadcrumbs, $parameters) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Информация о пользователе - ' . $parameters['user']->name, route('admin.users.show', $parameters['user']->id));
});

\Breadcrumbs::register('admin.users.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Создание пользователя', route('admin.users.create'));
});

\Breadcrumbs::register('admin.users.edit', function ($breadcrumbs, $parameters) {
    $breadcrumbs->parent('admin.users.index');
    $breadcrumbs->push('Редактирование пользователя - ' . $parameters['user']->name, route('admin.users.edit', $parameters['user']->id));
});

\Breadcrumbs::register('admin.users.settings.auth', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Настройки авторизации', route('admin.users.settings.auth'));
});

\Breadcrumbs::register('admin.users.settings.register', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Настройки регистрации', route('admin.users.settings.register'));
});

\Breadcrumbs::register('admin.users.settings.reset', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Настройки восстановления пароля', route('admin.users.settings.reset'));
});


/**
 * Для ролей пользователей
 */
\Breadcrumbs::register('admin.role.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Роли пользователей', route('admin.role.index'));
});
\Breadcrumbs::register('admin.role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.role.index');
    $breadcrumbs->push('Создание роли', route('admin.role.create'));
});
\Breadcrumbs::register('admin.role.show', function ($breadcrumbs, $parameters) {
    $breadcrumbs->parent('admin.role.index');
    $breadcrumbs->push('Информация о роли - ' . $parameters['role']->name, route('admin.role.show', $parameters['role']->id));
});
\Breadcrumbs::register('admin.role.edit', function ($breadcrumbs, $parameters) {
    $breadcrumbs->parent('admin.role.index');
    $breadcrumbs->push('Редактирование роли - ' . $parameters['role']->name, route('admin.role.edit', $parameters['role']->id));
});


/**
 * Для списка разрешений
 */
\Breadcrumbs::register('admin.permissions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push('Список разрешений', route('admin.permissions.index'));
});
\Breadcrumbs::register('admin.permissions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push('Создание разрешения', route('admin.permissions.create'));
});
\Breadcrumbs::register('admin.permissions.edit', function ($breadcrumbs, $parameters) {
    $breadcrumbs->parent('admin.permissions.index');
    $breadcrumbs->push('Редактирование разрешения - ' . $parameters['permission']->slug, route('admin.permissions.create'));
});