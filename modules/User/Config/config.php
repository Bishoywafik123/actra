<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'User',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'home' => [
                'title' => 'Website',
                'icon' => 'fas fa-home',
                'order' => 1,
                'route'=>'web.home'
            ],
            'user' => [
                'title' => 'Users',
                'icon' => 'fas fa-user-shield',
                'order' => 8,
                'route'=>'users.index'
            ],
        ]

        
    ],

];
