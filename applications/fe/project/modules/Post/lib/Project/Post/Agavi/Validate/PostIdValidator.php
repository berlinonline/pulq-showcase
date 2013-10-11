<?php

namespace Project\Post\Agavi\Validate;

use Project\Post\PostService;
use \AgaviValidator;

class PostIdValidator extends AgaviValidator
{
    protected function validate()
    {
        $data = $this->getData($this->getArgument());

        $post_service = new PostService();

        try {
            $post = $post_service->getById($data);
            $this->export($post, $this->getArgument());
            return true;
        } catch ( Exception $e) {
            return false;
        }
    }
}
