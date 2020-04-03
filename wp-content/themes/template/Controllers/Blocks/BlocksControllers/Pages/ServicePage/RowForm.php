<?php
namespace Controllers\Blocks\BlocksControllers\Pages\ServicePage;

class RowForm extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/Pages/ServicePage/rowForm',
            'id' => null,
            'fields' => ['title','btn'],

        ];

    public function __construct($input,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);

    }


}