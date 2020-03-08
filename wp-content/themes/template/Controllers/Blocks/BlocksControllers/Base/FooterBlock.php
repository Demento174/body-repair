<?php
namespace Controllers\Blocks\BlocksControllers\Base;


class FooterBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
             'template'  => './blocks/base/footer',
             'id' => 'options',
             'fields' => ['menu_footer','content','address','working_hours','phone'],
        ];

    public function __construct($options=[],$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , !$options?static::$options['fields']:$options);
        $this->set_data();
    }

    protected function set_data()
    {

        $this->data =
            [
                'menu' => get_field(self::$options['fields'][0],self::$options['id'])
            ];
    }

}