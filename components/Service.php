<?php


namespace Services\Target\Components;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AdServer\Client\ClientInterface;

class Service
{
    protected $contentClientApi;

    public function __construct(
        ClientInterface $contentClientApi
    )
    {
        $this->contentClientApi = $contentClientApi;
    }

    public function getTarget() : Response
    {
        $info = $this->contentClientApi->request(Request::create('/content/foo'))->getContent();
        return new Response($info . ' AND select from target service!');
    }
}