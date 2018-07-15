<?php

namespace App\Service;

use GuzzleHttp\Client;

class MarkdownRenderService
{
    protected $guzzle;

    public function __construct()
    {
        $this->guzzle = new Client(['base_uri'=>"https://api.github.com/"]);
    }

    public function render(string $markdown)
    {
        $body = [
            'text' => $markdown,
            'mode' => 'gfm',
        ];
        
        $response = $this->guzzle->request('POST', '/markdown', ['json'=>$body]);
      
        return (string)$response->getBody();
    }
}
