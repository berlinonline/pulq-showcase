<?php

use Project\Post\Agavi\View\BaseView;

class Post_Detail_DetailErrorView extends BaseView 
{
    public function executeHtml(AgaviRequestDataHolder $parameters)
    {
        return $this->createForwardContainer(
            AgaviConfig::get('actions.error_404_module'),
            AgaviConfig::get('actions.error_404_action')
        );
    }
}


