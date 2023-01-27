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
            ]
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
            'link' => '/settings'
        ],
    ]
];
