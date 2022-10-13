<?php

namespace App\Controller\Api;

use App\Serializer\PostSerializer;
use App\Service\PostService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractFOSRestController
{
    #[Rest\Get(path: '/posts')]
    public function getPosts(PostService $postService)
    {
        $response = new JsonResponse();
        $response->setData($postService->getPosts());
        return $response;
    }

    #[Rest\Get(path: '/post/{id}')]
    public function getPost($id, PostService $postService)
    {
        $response = new JsonResponse();
        $response->setData($postService->getPost($id));
        return $response;
    }

    #[Rest\Post(path: '/post')]
    public function postPost(Request $request, PostService $postService, PostSerializer $postSerializer)
    {
        $response = new JsonResponse();

        try {
            $array = $this->getValuesFromRequest($request);
            $array = $postService->createPost($this->getValuesFromRequest($request));
            $postSerializer->toEntity($array);
            $response->setData($array);
            $response->setStatusCode(200);
        } catch (\Error $e) {
            $response->setData('Not valid data');
            $response->setStatusCode(400);
        }

        return $response;
    }

    private function getValuesFromRequest(Request $request)
    {
        $data = array();
        $data['title'] = $request->get('title');
        $data['body'] = $request->get('body');
        $data['userId'] = $request->get('userId');
        return $data;
    }
}
