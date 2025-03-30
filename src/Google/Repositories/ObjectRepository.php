<?php declare(strict_types=1);

namespace Chiiya\Passes\Google\Repositories;

use Chiiya\Passes\Common\Component;
use Chiiya\Passes\Google\Components\Common\Message;
use Chiiya\Passes\Google\Requests\MessageRequest;

abstract class ObjectRepository extends BaseRepository implements ObjectRepositoryInterface
{
    /**
     * Get a list of all instances, filtered by class id.
     */
    final public function index(string $classId, array $parameters = []): Component
    {
        $url = $this->buildResourceUrl().'?'.http_build_query(array_merge([
            'classId' => $classId,
        ], $parameters));
        /** @var Component $class */
        $class = $this->getResponseClass();
        $response = $this->client->get($url);

        return $class::decode($response);
    }

    public function addMessage(string $objectId, Message $message): Component
    {
        $url = $this->buildEntityUrl($objectId).'/addMessage';
        /** @var Component $class */
        $class = $this->getInstanceClass();
        $response = $this->client->post($url, new MessageRequest($message));
        var_dump($response);
        return $class::decode($response);
    }
}
