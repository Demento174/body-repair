<?php
namespace Controllers\Blocks;
use Controllers\ACF\GetACF as GetACF;
use \Controllers\PostsAndTax\PostAbstract;


class BlockAbstractController
{
    protected $template;
    protected $id;
    protected $acf=[];
    protected $data=[];

    public function __construct($template,$id=null,$selectors=null)
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

        if(file_exists(dirname(dirname(__DIR__)).'/'.\Timber::$dirname.'/'.$this->template))
        {
            
            \Timber::render($this->template,!empty($this->data)?$this->data:null);
        }else
            {
                throw new \Exception('<pre class="debug" style="background-color: rgba(0,0,0,0.8);display: inline-block;border: 5px solid springgreen;color: white;padding: 1rem;">Template: <span style="color: blue">'.$this->template.'</span> not found');
            }

    }

    protected function set_data()
    {
        $this->data = $this->acf;
    }

}