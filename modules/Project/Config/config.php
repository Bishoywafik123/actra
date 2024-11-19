<?php

use Illuminate\Support\Facades\Lang;

return [
    'name' => 'Project',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'project' => [
                'title' => 'Products',
                'icon' => 'fa fa-list-alt',
                'order' => 3,
                'route'=>'project.index'
            ]
        ]
    ],

];
