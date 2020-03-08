<?php
namespace Controllers\Blocks\BlocksControllers\Forms;


use Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class FormRowPhone extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
             'template'  => './blocks/form/row_phone',
             'id' => null,
             'fields' => ['title','btnContent','response'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
        $this->set_data();
    }

    protected function set_data()
    {

        parent::set_data();
        $this->data['title']= TitleDataOutput::get_titleData($this->acf['title']);
        $this->data['class'] = 'bDark';
    }

}