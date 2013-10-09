<?php

use Project\Post\Agavi\Action\BaseAction;

class Post_IndexAction extends BaseAction
{
    public function execute(AgaviRequestDataHolder $rd)
    {
        $db = $this->getContext()->getDatabaseManager()->getDatabase('default');

        $query = Elastica\Query::create(new Elastica\Query\MatchAll());

        $result = $db->getResource()->getType('post')->search($query);

        $posts = array();
        foreach ($result->getResults() as $result) {
            $posts[] = $result->getData();
        }

        $this->setAttribute('posts', $posts);

        return 'Success';
    }
}
