<?php
namespace Controllers\Blocks\BlocksControllers\Titles;


class MainTitleTwoColumnsBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/title/mainTitle-twoColumns',
            'id' => null,
            'fields' => ['title','list','img'],
        ];

    public function __construct($options = null,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $options);
        $this->set_data();
    }

    protected function set_data()
    {
        parent::set_data();
        $this->data['title'] = TitleDataOutput::get_titleData($this->acf['title']);

    }

}