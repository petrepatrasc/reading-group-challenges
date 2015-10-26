<?php


namespace AppBundle\Listener;


use AppBundle\Controller\CatchableController;
use AppBundle\Controller\RewrittenController;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * Listener that redirects any requests made to the CatchableController into the RewrittenController.
 *
 * @see     CatchableController
 * @see     RewrittenController
 *
 * @package AppBundle\Listener
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class IgnoreControllerListener
{
    public function onKernelController(FilterControllerEvent $event)
    {
        $controllerWrapper = $event->getController();
        $controller        = $controllerWrapper[0];

        if ($controller instanceof CatchableController) {
            $overwriteController = new RewrittenController();
            $overwriteAction     = 'capturedAction';
            $overwriteWrapper    = [$overwriteController, $overwriteAction];

            $event->setController($overwriteWrapper);
        }
    }
}
