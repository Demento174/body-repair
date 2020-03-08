<?php
namespace Controllers\Blocks\BlocksControllers;

use Controllers\PostsAndTax\PostPortfolio;
use Controllers\PostsAndTax\TaxCat;

class CasesPage extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/cases',
            'id' => 'options',
            'fields' => ['cats','items'],
        ];

    public function __construct($input=null,$id = null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id );
    }

    protected function set_data()
    {

        $this->data['cats'] = TaxCat::set_termParent();
        $this->data['items'] = PostPortfolio::get_all_posts();

    }

}