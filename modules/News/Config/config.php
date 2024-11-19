<?php


return [
    'name' => 'News',
    'menus' => [
        'back_menus' => [ // support many menus per module
            'news' => [
                'title' => 'News',
                'icon' => 'fas fa-newspaper',
                'order' => 6,
                'route'=>'news.index',

            ]
        ]
    ],
];
