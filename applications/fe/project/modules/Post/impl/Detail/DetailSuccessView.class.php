<?php

use Project\Post\Agavi\View\BaseView;

class Post_Detail_DetailSuccessView extends BaseView 
{
    public function executeHtml(AgaviRequestDataHolder $parameters)
    {
        $this->setupHtml($parameters);

        $post = $parameters->getParameter('post');

        $this->setAttribute('post', $post->toArray('detail'));
    }
}


