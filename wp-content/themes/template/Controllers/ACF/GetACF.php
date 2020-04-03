<?php
namespace Controllers\ACF;
use \Controllers\PostsAndTax\PostAbstract as PostAbstract;


class GetACF{

    public static function getACF($selectors,$id=null,$dataInput=[],$defaultOptionsPage = '')
    {
        $data=$dataInput;

        $id = PostAbstract::get_id($id);

        if($defaultOptionsPage)
        {
            $defaultId = $defaultOptionsPage;
        }else
            {
                $defaultId = require('settings.php');
                $defaultId = $defaultId['defaultOptionsPage'];
            }

        foreach ($selectors as $key=>$item)
        {
        
            if( gettype($key) === 'string')
            {

                if( gettype($item) === 'string' && get_field($item,$id) )
                {
                    
                    $data[$key] = get_field($item,$id);
                    
                }else if(gettype($item) === 'string' && get_field($item,$defaultId))
                    {
                        
                        $data[$key] = get_field($item,$defaultId);
                    }else
                        {
                            $data[$key] = $item;
                        }
            }else
                {

                    if(get_field($item,$id))
                    {
                        $data[$item]= get_field($item,$id);

                    }else if(get_field($item,$defaultId))
                        {
                            $data[$item]= get_field($item,$defaultId);
                        }else
                            {
                                $data[$item] = null;
                            }
                }
        }
        return $data;
    }


}