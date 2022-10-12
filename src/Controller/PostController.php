<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/', name: 'app_post_list')]
    public function list(): Response
    {
        return $this->render('post/list.html.twig', []);
    }

    #[Route('/post/{id}', name: 'app_post_view')]
    public function view(): Response
    {
        return $this->render('post/post.html.twig', []);
    }
}
