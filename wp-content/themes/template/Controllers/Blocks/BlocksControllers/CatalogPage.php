<?php
namespace Controllers\Blocks\BlocksControllers;

use Controllers\PostsAndTax\PostFurniture;
use Controllers\PostsAndTax\TaxCat;

class CatalogPage extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/catalog-all',
            'id' => null,
            'fields' => ['cats','items'],
        ];

    public function __construct($input=null,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id,$input );
    }

    protected function set_data()
    {

        $this->data['cats'] = TaxCat::set_termParent();
        $this->data['items'] = PostFurniture::get_all_posts();

    }



}