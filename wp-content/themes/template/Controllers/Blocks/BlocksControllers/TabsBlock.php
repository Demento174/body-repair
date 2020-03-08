<?php
namespace Controllers\Blocks\BlocksControllers;
use \Controllers\PostsAndTax\TaxCat;

class TabsBlock extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
             'template'  => './blocks/tabs-cat',
             'id' => null,
             'fields' =>
                 [
                    'title'=>'tabs_title'
                 ],
        ];

    public function __construct($options=[],$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id , !$options?self::$options['fields']:$options);
        $this->set_data();
    }

    protected function set_data()
    {
       parent::set_data();
       $this->data['cats']= TaxCat::set_termHierarchical();
    }

}