<?php
namespace Controllers\Blocks;
use Controllers\ACF\GetACF as GetACF;
use \Controllers\PostsAndTax\PostAbstract;


Abstract class BlockAbstractController
{
    protected $template;
    protected $id;
    protected $acf=[];
    protected $data=[];

    protected function __construct($template,$id=null,$selectors=null)
    {
        $this->set_template($template);
        $this->set_id($id);
        if($selectors)
        {
            $this->set_acf($selectors);
        }
        $this->set_data();
    }

    private function set_template($template)
    {
        $this->template = $template.'.twig';
    }

    private function set_id($id=null)
    {
        $this->id =PostAbstract::get_id($id);
    }

    protected function set_acf($selectors)
    {
        if(!$selectors)
        {
            $this->acf = [];
        }else
            {
                $this->acf = GetACF::getACF($selectors,$this->id);
            }
    }

    public function render()
    {
        \Timber::render($this->template,!empty($this->data)?$this->data:null);
    }

    protected function set_data()
    {
        $this->data = $this->acf;
    }

}