<?php

$md = file_get_contents('text.md');

$data = array(
    'title' => 'Lorem ipsum dolor sit amet',
    'body' => $md,
    'type' => 'post',
    'image' => 'asset-1'
);

file_put_contents('post.json', json_encode($data));
