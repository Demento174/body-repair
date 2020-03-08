<?php
namespace Controllers\Blocks\BlocksControllers\Content;


class RowStringBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/content/row-string',
            'id' => null,
            'fields' => ['content'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

    protected function set_data()
    {
        parent::set_data();
        $this->data['class']='bWhiteD1';
    }

}