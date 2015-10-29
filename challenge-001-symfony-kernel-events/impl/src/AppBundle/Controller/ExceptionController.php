<?php


namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * A controller that throws Exceptions
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/exception")
 */
class ExceptionController extends Controller
{
    /**
     * @Route("/simple", name="app.exception.simple")
     * @Method({"GET"})
     */
    public function simpleAction()
    {
        throw new \LogicException('This error should be thrown and captured by a listener');
    }
}
