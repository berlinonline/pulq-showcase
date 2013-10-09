<?php

use Project\Post\Agavi\View\BaseView;

class Post_Index_IndexSuccessView extends BaseView 
{
    public function executeHtml(AgaviRequestDataHolder $parameters)
    {
        $this->setupHtml($parameters);
    }
}


