<?php


namespace AppBundle\Tests\Functional;


use AppBundle\Tests\AbstractFunctionalTest;
use Symfony\Component\HttpFoundation\Request;

/**
 * Test the API Controller via BrowserKit.
 *
 * @package AppBundle\Tests\Functional
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class ApiControllerTest extends AbstractFunctionalTest
{
    public function testGivenThatWeWantToRetrieveAProductThenWeWillGetAJsonResponse()
    {
        $productApiUrl = $this->getRouter()->generate('app.api.product');

        $this->client->request(Request::METHOD_GET, $productApiUrl);
        $response = $this->client->getResponse();

        $this->assertContains('json', $response->headers->get('Content-Type'));
    }
}
