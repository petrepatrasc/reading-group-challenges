<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * The requests for this controller should always be captured.
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/catchable")
 */
class CatchableController extends Controller
{
    /**
     * @Route("/", name="app.catchable.index")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        throw new \LogicException('This controller should not be called, its routes should instead be intercepted.');
    }
}
