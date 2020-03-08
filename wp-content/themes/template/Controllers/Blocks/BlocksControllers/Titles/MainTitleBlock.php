<?php
namespace Controllers\Blocks\BlocksControllers\Titles;
use \Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class MainTitleBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
             'template'  => './blocks/title/mainTitle',
             'id' => null,
             'fields' =>
                [
                    'title',
                    'subTitle',
                    'img'
                ],
        ];


    public function __construct($options,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $options);
    }



    protected function set_data($fields=[])
    {

        parent::set_data();
//        $this->data['class']='flex_column';

        $this->data['title'] = TitleDataOutput::get_titleData($this->acf['title'],$this->acf['subTitle']);

    }

}