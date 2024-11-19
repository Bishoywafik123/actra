<?php


return [
    'name' => 'Slider',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'sliders' => [
                'title' => 'Gallary',
                'icon' => 'fas fa-images',
                'order' => 5,
                'route'=>'slider.index',

            ]
        ]
    ],

  
];
