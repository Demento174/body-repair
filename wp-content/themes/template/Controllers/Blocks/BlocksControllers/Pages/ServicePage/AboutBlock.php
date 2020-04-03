<?php
namespace Controllers\Blocks\BlocksControllers\Pages\ServicePage;

class AboutBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/Pages/ServicePage/aboutBlock',
            'id' => null,
            'fields' => ['title','content','img'],

        ];

    public function __construct($input,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);

    }


}