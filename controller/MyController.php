<?php


namespace Services\Target\Controller;


use AdServer\Engine\Engine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MyController extends Controller
{
    public function __construct()
    {
        $this->setContainer(Engine::getContainer());
    }

    public function foo()
    {
        return $this->get('TargetService')->getTarget();
    }

    public function foobar()
    {
        throw new \RuntimeException('action not create');
    }
}