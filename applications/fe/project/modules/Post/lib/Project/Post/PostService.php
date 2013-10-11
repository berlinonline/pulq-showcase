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

    public function getAll()
    {
        $query = Query::create(
            new Query\MatchAll()
        );
        $resultData = $this->executeQuery($query);

        return $this->extractFromResultSet($resultData);
    }

    public function getById($id)
    {
        $query = new Query\Field('_id', $id);
        $resultData = $this->executeQuery(Query::create($query));

        $post_set = $this->extractFromResultSet($resultData);

        if ($post_set->getTotalCount() < 1)
        {
            throw new NotFoundException('Post not found.');
        }

        return $post_set[0];
    }
}

