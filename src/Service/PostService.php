<?php

namespace App\Service;

use App\Serializer\PostSerializer;

class PostService
{
    public function __construct(private JsonplaceholderService $jsonplaceholderService,
                                private PostSerializer $postSerializer
    ) {}

    public function getPosts(): array
    {
        $posts = $this->jsonplaceholderService->getPosts();
        $posts = $this->postSerializer->toArrayExtendList($posts);
        return $posts;
    }

    public function getPost($id): array
    {
        $post = $this->jsonplaceholderService->getPost($id);
        $post = $this->postSerializer->toArrayExtend($post);
        return $post;
    }

    public function createPost($data): array
    {
        $post = $this->jsonplaceholderService->createPost($data);
        $post = $this->postSerializer->toArrayExtend($post);
        return $post;
    }

}