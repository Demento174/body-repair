<?php
namespace Controllers\Blocks\BlocksControllers\Forms;


class FormColumnContentPhone extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
            'template'  => './blocks/form/column_contentPhone',
            'id' => null,
            'fields' => ['form'],
        ];

    public function __construct($input,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , $input);
        $this->set_data();
    }

    protected function set_data()
    {

//        parent::set_data();
        $this->data['title']= $this->acf['form']['title'];
        $this->data['content']= $this->acf['form']['subtitle'];
        $this->data['class'] = 'bWhiteD1';
    }

}