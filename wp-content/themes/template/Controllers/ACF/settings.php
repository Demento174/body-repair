<?php
return
    [
        'optionsPage'=>
            [
                [
                    'title'=>'Настройка Сайта',
                    'slug'=>'option_site',
                    'position' => 3,
                    'icon' => 'dashicons-admin-tools',
                    'id' => 'options',
                ],
                [
                    'title'=>'Общие блоки',
                    'slug'=>'repairs_blocks',
                    'position' => 4,
                    'icon' => 'dashicons-welcome-widgets-menus',
                    'id' => 'options',
                ],
            ],
        'optionsSubPage'=>
            [
//                [
//                    'id' => 'options_post-furniture',
//                    'slug'=>'option_post-furniture',
//                    'title'=>'Настройка блоков "Карточка товара"',
//                    'parent_slug'=> 'edit.php?post_type=furniture',
//                ],
            ],
        'defaultOptionsPage'=>'options'
    ];