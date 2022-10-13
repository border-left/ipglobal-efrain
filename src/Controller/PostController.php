<?php

namespace App\Controller;

use App\Service\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_post_list')]
    public function list(PostService $postService): Response
    {
        $posts = $postService->getPosts();
        return $this->render('post/list.html.twig', [
            'posts' => $posts,
        ]);
    }

    #[Route('/post/{id}', name: 'app_post_view')]
    public function view($id, PostService $postService): Response
    {
        $post = $postService->getPost($id);
        return $this->render('post/post.html.twig', [
            'post' => $post,
        ]);
    }
}
