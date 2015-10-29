<?php


namespace AppBundle\Listener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class LogicExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();

        if ($exception instanceof \LogicException) {
            $response = new Response('All good, caught the exception');
            $event->setResponse($response);
        }
    }
}
