<?php

use Project\Post\Agavi\View\BaseView;
use Project\Post\PostService;

class Post_Index_IndexSuccessView extends BaseView 
{
    public function executeHtml(AgaviRequestDataHolder $parameters)
    {
        $this->setupHtml($parameters);
        $this->setAttribute('_title', 'Index');
        $post_service = new PostService();

        $posts = $post_service->getAll();

        $this->setAttribute('posts', $posts->toArrays('list'));
    }
}


