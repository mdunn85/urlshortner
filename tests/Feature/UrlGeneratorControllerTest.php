<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlGeneratorControllerTest extends TestCase
{
    public function testHomePagePost()
    {
        //Test no post data
        $response = $this->post("/");

        $response->assertStatus(400);

        $responseJson = json_decode($response->content());

        $this->assertFalse($responseJson->success);

        $this->assertTrue($responseJson->message == "The given data was invalid.");

        $this->assertTrue(count($responseJson->errors) > 0);

        $this->assertTrue($responseJson->errors[0] == "A url is required.");

        $this->assertFalse($responseJson->success);

        //Test not valid data

        $response = $this->post("/", ["url" => "hello"]);

        $response->assertStatus(400);

        $responseJson = json_decode($response->content());

        $this->assertTrue($responseJson->message == "The given data was invalid.");

        $this->assertTrue(count($responseJson->errors) > 0);

        $this->assertTrue($responseJson->errors[0] == "A valid url is required.");

        $this->assertFalse($responseJson->success);

        //Test valid data

        $url = "http://www.payasugym.com";

        $response = $this->post("/", ["url" => $url]);

        $response->assertSuccessful();

        $responseJson = json_decode($response->content());

        $this->assertTrue($responseJson->success);

        $this->assertTrue(count($responseJson->errors) == 0);

        $this->assertTrue($responseJson->url == $url);
        $this->assertTrue(strlen($responseJson->url) > 0);

        $this->assertTrue(strlen($responseJson->short_url) > 0);
    }

    public function testGetUrl()
    {
        //Test non cached value
        $response = $this->get('/test');
        $response->assertStatus(404);

        //Test redirect
        $url = "http://www.payasugym.com";

        $response = $this->post("/", ["url" => $url]);

        $response->assertSuccessful();

        $responseJson = json_decode($response->content());

        $this->assertTrue($responseJson->success);
        $this->assertTrue(strlen($responseJson->short_url) > 0);

        $response = $this->get($responseJson->short_url);
        $response->assertStatus(301);
    }
}
