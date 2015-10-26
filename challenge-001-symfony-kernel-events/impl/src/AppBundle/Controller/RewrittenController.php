<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Catches any requests made to the Catchable Controller.
 *
 * @see     CatchableController
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/rewritten")
 */
class RewrittenController extends Controller
{
    const DEFAULT_MESSAGE = 'The event listener worked correctly, request has been captured';

    /**
     * @Route("/captured", name="app.rewritten.captured")
     * @Method({"GET"})
     *
     * @return Response
     */
    public function capturedAction()
    {
        return new Response(self::DEFAULT_MESSAGE);
    }
}
