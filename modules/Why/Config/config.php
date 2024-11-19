<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'Why',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'why' => [
                'title' => 'Why choose us',
                'icon' => 'fa fa-list-alt',
                'order' =>5,
                'route'=>'why.index'
            ]
        ]
    ],

];