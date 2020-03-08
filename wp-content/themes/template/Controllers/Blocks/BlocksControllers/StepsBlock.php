<?php
namespace Controllers\Blocks\BlocksControllers;
use Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;

class StepsBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/steps',
            'id' => null,
            'fields' =>['title','items'],
        ];

    public function __construct($input=[],$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
    }

    protected function set_data()
    {
        parent::set_data();
        $this->data['title'] = TitleDataOutput::get_titleData($this->data['title'],'','textCenter');
    }

}