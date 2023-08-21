<?php

namespace PedroSantiago\LaravelClickup;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class Clickup
{
    const BASE_URL = 'https://api.clickup.com/api/v2/';

    public function __construct(private readonly string $token)
    {
    }

    public function api(): PendingRequest
    {
        return Http::withToken($this->token, '')->baseUrl(self::BASE_URL);
    }

    public function getTask(string $taskId)
    {
        return $this->api()->get('task/'.$taskId)->object();
    }

    public function commentTask(string $taskId, string $comment)
    {
        return $this->api()->post('task/'.$taskId.'/comment', ['comment_text' => $comment])->object();
    }

    public function addTag(string $taskId, string $tagName)
    {
        return $this->api()->post('task/'.$taskId.'/tag/'.$tagName)->object();
    }

    public function removeTag(string $taskId, string $tagName)
    {
        return $this->api()->delete('task/'.$taskId.'/tag/'.$tagName)->object();
    }
}
