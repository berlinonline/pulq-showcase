<?php

namespace Project\Post;
use Pulq\Services\BaseElasticSearchService;
use Pulq\Exceptions\NotFoundException;
use Project\Post\Post;
use Elastica\Query;
use Elastica\Query\MatchAll;

class PostService extends BaseElasticSearchService
{
    protected $es_index = 'default';
    protected $data_object_class = 'Project\Post\Post';
    protected $es_type = 'post';
}

