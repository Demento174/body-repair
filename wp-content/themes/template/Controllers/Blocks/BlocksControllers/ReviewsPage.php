<?php
namespace Controllers\Blocks\BlocksControllers;


class ReviewsPage extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './about',
            'id' => null,
            'fields' => ['reviews'],
        ];

    public function __construct($input=[],$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

//    protected function set_data()
//    {
//        $this->data =
//            [
//                'items'=>$this->acf['reviews'],
//            ];
//
//    }

}