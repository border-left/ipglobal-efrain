<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class JsonplaceholderService
{
    const BASE_URL_JSONPLACEHOLDER = 'https://jsonplaceholder.typicode.com/posts';

    public function __construct(private HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     */
    public function getPosts()
    {
        $response = $this->client->request(
            'GET',
            self::BASE_URL_JSONPLACEHOLDER
        );
        $posts = $response->toArray();
        return $posts;
    }

    public function getPost($id)
    {
        $response = $this->client->request(
            'GET',
            self::BASE_URL_JSONPLACEHOLDER.'/'.$id
        );
        $posts = $response->toArray();
        return $posts;
    }

    public function createPost($data)
    {
        $response = $this->client->request(
            'POST',
            self::BASE_URL_JSONPLACEHOLDER,
            ['json' => $data]
        );
        $posts = $response->toArray();
        return $posts;
    }

}