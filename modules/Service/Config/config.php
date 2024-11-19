<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'Service',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'service' => [
                'title' => 'Services',
                'icon' => 'fa fa-list-alt',
                'order' => 2,
                'route'=>'service.index'
            ]
        ]
    ],

];
