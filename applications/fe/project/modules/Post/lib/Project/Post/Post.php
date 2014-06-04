<?php

namespace Project\Post;
use Pulq\Data\BaseDataObject;
use Pulq\Services\AssetService;
use \AgaviContext;

class Post extends BaseDataObject
{
    protected $_id;
    protected $title;
    protected $body;
    protected $image;

    public function getArrayScopes()
    {
        return array(
            'list' => array(
                'id',
                'title',
                'url'
            ),
            'detail' => array(
                'id',
                'title',
                'image',
                'body',
                'url'
            )
        );
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getImage()
    {
        $asset_service = new AssetService();

        
    }

    public function getUrl()
    {
        $routing = AgaviContext::getInstance()->getRouting();

        return $routing->gen('post.detail', array(
            'post' => $this->getId()
        ));
    }
}
