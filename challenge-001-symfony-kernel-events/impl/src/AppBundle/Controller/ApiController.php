<?php


namespace AppBundle\Controller;


use AppBundle\Enum\HeaderKey;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ApiController
 *
 * @package AppBundle\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 *
 * @Route("/api")
 */
class ApiController extends Controller
{
    /**
     * This won't really fetch a product or anything like that. It's meant
     * to return some data in the form of an array so that something else
     * can happen with it further down the road.
     *
     * @param Request $request
     *
     * @Route("/product", name="app.api.product")
     * @Method({"GET"})
     *
     * @return array
     */
    public function getProductAction(Request $request)
    {
        $headerKey = $request->headers->get(HeaderKey::REQUEST_ADDITION);

        if (null === $headerKey) {
            throw new \LogicException('A previous request interceptor should have attached a header to this request');
        }

        return [
            HeaderKey::REQUEST_ADDITION => HeaderKey::REQUEST_ADDITION_VALUE,
            'product'                   => [
                'id'   => 312,
                'name' => 'A product name'
            ]
        ];
    }
}
