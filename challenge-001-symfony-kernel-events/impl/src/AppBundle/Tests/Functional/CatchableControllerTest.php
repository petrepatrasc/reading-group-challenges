<?php


namespace AppBundle\Tests\Functional;

use AppBundle\Controller\RewrittenController;
use AppBundle\Tests\AbstractFunctionalTest;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Tests the results of catching any requests to the Catchable controller,
 * in a functional test.
 *
 * @see     CatchableController
 * @see     RewrittenController
 *
 * @package AppBundle\Tests\Functional
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class CatchableControllerTest extends AbstractFunctionalTest
{
    public function testGivenThatARequestIsMadeToACatchableControllerThenTheControllerIsOverwrittenByTheListener()
    {
        $catchableUrl = $this->getRouter()->generate('app.catchable.index');

        $this->client->request(Request::METHOD_GET, $catchableUrl);
        $responseContent = $this->client->getResponse()->getContent();

        $this->assertEquals(Response::HTTP_OK, $this->client->getResponse()->getStatusCode(), 'Listener must not have worked, request should normally be successful.');
        $this->assertEquals(RewrittenController::DEFAULT_MESSAGE, $responseContent, 'The message does not match, check the constant as it should be the same.');
    }
}
