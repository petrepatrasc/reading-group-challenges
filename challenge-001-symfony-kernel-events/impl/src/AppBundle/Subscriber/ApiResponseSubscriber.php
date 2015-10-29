<?php


namespace AppBundle\Subscriber;


use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Handles responses from API subscribers.
 *
 * @package AppBundle\Subscriber
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class ApiResponseSubscriber implements EventSubscriberInterface
{
    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::VIEW => 'onKernelView'
        ];
    }

    public function onKernelView(GetResponseForControllerResultEvent $event)
    {
        $result = $event->getControllerResult();

        if (true === is_array($result)) {
            $response = new JsonResponse($result);
            $event->setResponse($response);
        }
    }
}
