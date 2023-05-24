<?php

namespace App\Constants;

enum Permissions: string
{
    case PRODUCTS_INDEX = 'products.index';
    case PRODUCTS_CREATE = 'products.create';
    case PRODUCTS_SHOW = 'products.show';
    case PRODUCTS_UPDATE = 'products.update';
    case PRODUCTS_DELETE = 'products.delete';

    case CATEGORIES_INDEX = 'categories.index';
    case CATEGORIES_CREATE = 'categories.create';
    case CATEGORIES_SHOW = 'categories.show';
    case CATEGORIES_UPDATE = 'categories.update';
    case CATEGORIES_DELETE = 'categories.delete';

    case USERS_INDEX = 'users.index';
    case USERS_CREATE = 'users.create';
    case USERS_SHOW = 'users.show';
    case USERS_UPDATE = 'users.update';
    case USERS_DELETE = 'users.delete';

    case ROLES_INDEX = 'roles.index';
    case ROLES_CREATE = 'roles.create';
    case ROLES_SHOW = 'roles.show';
    case ROLES_UPDATE = 'roles.update';
    case ROLES_DELETE = 'roles.delete';

    public static function toArray(): array
    {
        return array_column(self::cases(), 'value');
    }
}
