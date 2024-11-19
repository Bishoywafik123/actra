<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'Category',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'category' => [
                'title' => 'Categories',
                'icon' => 'fa fa-list-alt',
                'order' => 2,
                'route'=>'category.index'
            ]
        ]
    ],

];
