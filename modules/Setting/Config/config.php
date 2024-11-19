<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'Setting',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'setting' => [
                'title' => 'Static Setting',
                'icon' => 'fas fa-cog',
                'order' => 7,
                'route'=>'setting.index',
            ],

        ]
    ],

];
