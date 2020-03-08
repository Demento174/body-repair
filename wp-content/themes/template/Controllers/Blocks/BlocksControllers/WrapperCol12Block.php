<?php
namespace Controllers\Blocks\BlocksControllers;


class WrapperCol12Block extends \Controllers\Blocks\BlockAbstractController {

    static $options  =
            [
                "template"  => './blocks/wrapper-col12',
                "id" => null,
                'field'=> ['template']
            ];


    public function __construct($input=[],$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }



}