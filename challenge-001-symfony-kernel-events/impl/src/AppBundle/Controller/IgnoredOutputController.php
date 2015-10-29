<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * The output of this controller should always be overwritten.
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/ignored")
 */
class IgnoredOutputController extends Controller
{
    /**
     * @Route("/index", name="app.ignored.index")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return new Response('I come from the controller');
    }
}
