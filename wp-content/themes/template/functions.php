<?php
/**
 * Template functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Template
 * @since 1.0
 */


require_once (get_template_directory().'/autoload.php');

new Controllers\TemplateSetup\TemplateSetup();

new Controllers\TwigSettings\TwigSettings();

new Controllers\ACF\ACFController();

new Controllers\ScriptsAndStyles\RegisterScriptsAndStyle();

new Controllers\DisableContentEditor\DisableContentEditorController();

new Controllers\CPT\CustomPostTypeController();

new Controllers\CPT\CustomTaxonomyController();

new Controllers\DisableAdminMenu\DisableAdminMenuController();

new Controllers\UploadAttachmentBySku\UploadAttachmentBySku();

function renderBlock($block,$options=[],$id=null)
{
    $blockClass = '\Controllers\Blocks\BlocksControllers\\'.$block;

    if(class_exists($blockClass))
    {
        $class = new $blockClass($options,$id);
        return $class->render();
    }else
        {
           $classBlockAbstractController =  new Controllers\Blocks\BlockAbstractController($block,$id,$options);
           $classBlockAbstractController->render();
        }
}

function sort_cat($first,$second)
{

    $a = (int) get_metadata('term', $first->id, 'order', true );
    $b = (int) get_metadata('term', $second->id, 'order', true );

    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}


function get_pagesServices()
{
    return get_page_children( 78, get_posts(['post_type'=>'page','nemberposts'=>-1]) );
}

