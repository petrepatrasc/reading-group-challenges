<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RegularController
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/regular")
 */
class RegularController extends Controller
{
    /**
     * @Route("/", name="app.regular.index")
     * @Method({"GET"})
     */
    public function indexAction()
    {
        return new Response('This response is coming from a regular controller.');
    }
}
