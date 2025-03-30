<?php

namespace Chiiya\Passes\Google\Requests;

use Chiiya\Passes\Google\Components\Common\Message;
use JsonSerializable;

class MessageRequest implements JsonSerializable
{
    private $request;
    public function __construct(Message $message) {
        $this->request = [
            "message" => $message
        ];
    }

    public function jsonSerialize(): mixed {
        return $this->request;
    }
}
