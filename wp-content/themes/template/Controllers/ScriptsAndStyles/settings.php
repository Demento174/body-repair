<?php
return
    [
        'folder'=>get_template_directory_uri().'/public',
        'data'=>
            [
                [
                    'src'=>'/js/index.js',
                    'deps'=>null,
                    'ver'=>null,
                    'in_footer'=>false,
                ],
                [
                    'src'=>'/js/script-verstak.js',
                    'deps'=>null,
                    'ver'=>null,
                    'in_footer'=>true,
                ],
                [
                    'src'=>'/css/style.css',
                    'deps'=>null,
                    'ver'=>null,
                    'media'=>false,//https://www.w3.org/TR/CSS2/media.html#media-types
                ],

//                [
//                    'src'=>'/less/style.less',
//                    'deps'=>null,
//                    'ver'=>null,
//                    'media'=>false,//https://www.w3.org/TR/CSS2/media.html#media-types
//                ],
            ],
    ];