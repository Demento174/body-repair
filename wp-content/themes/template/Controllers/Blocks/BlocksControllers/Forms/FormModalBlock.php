<?php
namespace Controllers\Blocks\BlocksControllers\Forms;


class FormModalBlock extends \Controllers\Blocks\BlockAbstractController {


    static $options =
        [
             'template'  => './blocks/form/form_modal',
             'id' => 'options',
             'fields' => ['title'=>'formModal_title','response'=>'formModal_response'],
        ];

    public function __construct()
    {
        parent::__construct(static::$options['template']);
        $this->set_data();
    }


    public static function get_data()
    {

        return
            [
                'title'=>get_field(self::$options['fields']['title'],self::$options['id']),
                'response'=>get_field(self::$options['fields']['response'],self::$options['id']),
            ];
    }

}