<?php
namespace Controllers\UploadAttachmentBySku;

class UploadAttachmentBySku
{
    private $attachment;
    private $sku;
    private $product;

    public function __construct()
    {
        add_action( 'add_attachment', [$this,'handler']);

        add_action('future_to_publish', [$this,'handler_by_save_post']);
        add_action('draft_to_publish', [$this,'handler_by_save_post']);
        add_action('new_to_publish', [$this,'handler_by_save_post']);
        add_action('pending_to_publish', [$this,'handler_by_save_post']);
        add_action('save_post', [$this,'handler_by_save_post']);
    }

    private function set_attachment($id)
    {
        $this->attachment = get_post($id);
    }

    private function set_attachment_by_title($title)
    {
        $this->attachment = get_page_by_title($title, OBJECT, 'attachment');
    }

    private function set_sku($attachment)
    {
        $this->sku = $attachment->post_title;
    }

    private function set_product_by_sku($sku)
    {
        $this->product = wc_get_product_id_by_sku( $sku );
    }

    private function add_image_to_product()
    {
        set_post_thumbnail( $this->product, $this->attachment->ID );
    }


    public function handler($attachment_id)
    {

        $this->set_attachment($attachment_id);
        if(!$this->attachment)
        {
            return;
        }

        $this->set_sku($this->attachment);

        $this->set_product_by_sku($this->sku);

        if($this->product)
        {
            $this->add_image_to_product();
        }
    }

    public function handler_by_save_post()
    {
        global $post;
        if ($post->post_type !== 'product')
        {
            return;
        }
        // проверка на наличие миниатюры посте
        if( has_post_thumbnail($post->ID) )
        {
            return;
        }

        $product  = new \Controllers\PostsAndTax\PostProduct($post->ID);
        $sku = $product->number;

        $this->set_product_by_sku($sku);
        $this->set_attachment_by_title($sku);

        if( $this->attachment )
        {
            $this->add_image_to_product();
        }
    }


}