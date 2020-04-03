<?php
namespace Controllers\Blocks\BlocksControllers\Pages\ServicePage;

class Portfolio extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/Pages/ServicePage/portfolio',
            'id' => null,
            'fields' => ['icons'=>['credit','deadline'],'items'],

        ];

    public function __construct($input,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }


}