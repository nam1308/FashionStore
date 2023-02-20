<?php

return [
    'admin' => [
        [
            'name' => 'Dashboard',
            'icon' => 'ti-dashboard',
            'link' => '/'
        ],
        [
            'name' => 'Product',
            'icon' => 'ti-dropbox-alt',
            'link' => '/',
            'items' => [
                [
                    'name' => 'All products',
                    'link' => '/products',
                ],
                [
                    'name' => 'Categories',
                    'link' => '/products/category',
                ],
                [
                    'name' => 'Attributes',
                    'link' => '/products/attribute',
                ],
            ]
        ],
        [
            'name' => 'Blog',
            'icon' => 'ti-dropbox-alt',
            'link' => '/',
            'items' => [
                [
                    'name' => 'All Blog',
                    'link' => '/blog',
                ],
                [
                    'name' => 'Category Blog',
                    'link' => '/categoryBlog',
                ]
            ],
        ],
        [
            'name' => 'Accounts',
            'icon' => 'fa-user',
            'link' => '/',
            'items' => [
                [
                    'name' => 'Accounts',
                    'link' => '/accounts',
                ],
                [
                    'name' => 'Role & Permission',
                    'link' => '/account/role',
                ],
            ]
        ],
        [
            'name' => 'Settings',
            'icon' => 'ti-settings',
            'link' => '/',
            'items' => [
                [
                    'name' => 'Basic info',
                    'link' => '/settings'
                ],
                [
                    'name' => 'Menu',
                    'link' => '/settings/menu'
                ]
            ]
        ],
    ]
];
