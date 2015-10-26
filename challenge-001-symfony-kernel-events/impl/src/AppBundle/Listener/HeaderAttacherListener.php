<?php


namespace AppBundle\Listener;


use AppBundle\Enum\HeaderKey;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Listener that attaches a header to all requests.
 *
 * @package AppBundle\Listener
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class HeaderAttacherListener
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $headerKey   = HeaderKey::REQUEST_ADDITION;
        $headerValue = HeaderKey::REQUEST_ADDITION_VALUE;

        $event->getRequest()->headers->set($headerKey, $headerValue);
    }
}
