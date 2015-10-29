<?php


namespace AppBundle\Subscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Overwrites the content coing from certain controllers.
 *
 * @package AppBundle\Subscriber
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class IgnoredOutputSubscriber implements EventSubscriberInterface
{
    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::RESPONSE => ['onKernelResponse', 300]
        ];
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        $response = $event->getResponse();

        if ($response->getContent() === 'I come from the controller') {
            $newResponse = new Response('Interception OK');
            $event->setResponse($newResponse);
        }
    }
}
