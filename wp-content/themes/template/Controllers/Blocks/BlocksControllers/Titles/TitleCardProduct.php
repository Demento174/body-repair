<?php
namespace Controllers\Blocks\BlocksControllers\Titles;


class TitleCardProduct extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/title/title-cardProduct',
            'id' => null,
            'fields' =>
                ['img','title','lot','content','price','characters'],
        ];

    public function __construct($input = null,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id,$input);
    }



    protected function set_data()
    {
        parent::set_data();

    }

}