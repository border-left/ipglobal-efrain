<?php

namespace App\Serializer;

use App\Entity\Author;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class PostSerializer
{
    public function toArrayExtend($post)
    {
        $post['author'] = [
            'id' => $post['userId'],
            'name' => 'Author '.$post['userId']
        ];
        unset($post['userId']);
        return $post;
    }

    public function toArrayExtendList($posts)
    {
        for($i=0; $i<count($posts); $i++) {
            $posts[$i] = $this->toArrayExtend($posts[$i]);
        }
        return $posts;
    }

    public function toEntity($array)
    {
        $post = new Post();
        $post->setAuthorId($array['author']['id']);
        $post->setTitle($array['title']);
        $post->setBody($array['body']);
        return $post;
    }
}