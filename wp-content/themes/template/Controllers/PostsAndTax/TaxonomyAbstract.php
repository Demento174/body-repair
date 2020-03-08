<?php
namespace Controllers\PostsAndTax;
use \Controllers\ACF\GetACF as GetACF;

class TaxonomyAbstract{

    protected $type;
    protected $term;
    protected $id;
    public $title;
    public $slug;
    public $description;
    public $link;
    public $acf;
    public $parent;
    public $children;

    public function __construct($type,$id,$acf=[])
    {
        $this->type = $type;
        $this->set_term($id);
        if($this->term)
        {
            $this->set_id();
            $this->set_title();
            $this->set_slug();
            $this->set_description();
            $this->set_link();
            $this->set_acf($acf);
            $this->set_parent();
            $this->set_children();
        }
    }

    private  function set_term($id)
    {
        $this->term =  get_term_by( 'id', $id, $this->type);;
    }

    private function set_id()
    {
        $this->id = $this->term->term_id;
    }

    private function set_title()
    {
        $this->title = $this->term->name;
    }

    private function set_slug()
    {
        $this->slug = $this->term->slug;
    }

    private function set_description()
    {
        $this->description = $this->term->description;
    }

    protected function set_link()
    {
        $this->link = get_term_link($this->id, $this->type );;
    }

    protected function set_acf($acf=[])
    {
        if(!$acf || !$this->term)
        {
            $this->acf = [];
        }else
        {
            $this->acf = GetACF::getACF($acf,$this->term);
        }
    }

    protected function set_parent()
    {
        $this->parent = get_ancestors( $this->id, $this->type, 'taxonomy' );
    }

    protected function set_children()
    {
        $this->children = get_terms( $this->type,['hide_empty' => false,'parent'=>$this->id]);
    }

    public static function set_termParent($type='',$className='')
    {
        $result = [];

        foreach (get_terms( $type,['hide_empty' => true,'parent'=>0]) as $item)
        {
            $result[] = new $className($item->term_id);
        }

        return $result;
    }

    public static function set_termHierarchical($type='',$className='')
    {
        $result = [];

        foreach (get_terms( $type,['hide_empty' => true,'parent'=>0]) as $key=>$item)
        {

            $result[$key]['term'] = new $className($item->term_id);
            foreach (get_terms( $type,['hide_empty' => false,'parent'=>$item->term_id]) as $tax)
            {
                $result[$key]['children'][] = new $className($tax->term_id);;
            }
        }

        return $result;
    }
}