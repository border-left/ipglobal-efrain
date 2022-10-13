<?php

namespace App\Tests\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PostControllerTest extends WebTestCase
{

    public function testGetPostsValid()
    {
        $client = static::createClient();
        $client->request('GET', 'http://127.0.0.1:8000/api/v1/posts');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testGetPostValid()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'http://127.0.0.1:8000/api/v1/post/1');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(4, $crawler);// user, id, title, body
    }

    public function testGetPostInvalid()
    {
        $client = static::createClient();
        $client->request('GET', 'http://127.0.0.1:8000/api/v1/posts/');
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }

    public function testCreatePostsValid()
    {
        $client = static::createClient();
        $client->request('POST', 'http://127.0.0.1:8000/api/v1/post',
            ['json' => '{"title" => "titulo post", "body" => "body post", "userId" => 97}']);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testCreatePostInvalid()
    {
        $client = static::createClient();
        $client->request(
        	'POST', 
        	'http://127.0.0.1:8000/api/v1/post',
        	[],
        	[],
        	['CONTENT_TYPE' => 'application/json'],
        	'{"title": ""}'
        );
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
        $client->request(
        	'POST', 
        	'/api/v1/posts',
        	[],
        	[],
        	['CONTENT_TYPE' => 'application/json'],
        	''
        );
        $this->assertEquals(400, $client->getResponse()->getStatusCode());
    }
}
