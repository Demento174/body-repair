<?php
namespace Controllers\Blocks\BlocksControllers\Carousels;
use Controllers\Blocks\BlocksControllers\Titles\TitleDataOutput;
use \Controllers\PostsAndTax\PostPortfolio;

class CarouselCardFurniture extends \Controllers\Blocks\BlockAbstractController {

    static $options =
        [
            'template'  => './blocks/carousels/carousel-cards',
            'id' => null,
            'templateCard' => 'furniture',
        ];

    public function __construct($input ,$id=null)
    {
        parent::__construct(static::$options['template'], !$id?static::$options['id']:$id ,$input);

    }


    private function set_items()
    {
        if(isset($this->acf['taxonomy']))
        {
            $this->data['items'] = PostPortfolio::get_taxonomy_posts($this->acf['taxonomy']);
        }
        elseif(isset($this->acf['switch']) && $this->acf['switch'] === false)
        {
            $this->data['items'] = PostPortfolio::get_sample_posts($this->acf['includes']);
        }else
            {
                $this->data['items']=PostPortfolio::get_all_posts();
            }

    }


    protected function set_data()
    {
        $this->data['template']=self::$options['templateCard'];

        $this->data['title'] = TitleDataOutput::get_titleData(!isset($this->acf['title'])?'Выполненные работы':$this->acf['title'],null,'textCenter');

        $this->set_items();

    }

}