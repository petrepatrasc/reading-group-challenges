<?php


namespace AppBundle\Tests\Unit\Controller;

use AppBundle\Controller\ApiController;
use AppBundle\Enum\HeaderKey;
use Symfony\Component\HttpFoundation\Request;

/**
 * Test the API controller in isolation.
 *
 * @package AppBundle\Tests\Unit\Controller
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class ApiControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ApiController
     */
    protected $controller;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->request = Request::create('test-url');

        $this->controller = new ApiController();
    }

    public function testGivenThatWeDidNotPreviouslyAttachTheXReadingGroupHeaderThenAnExceptionWillBeThrown()
    {
        $this->request->headers->remove(HeaderKey::REQUEST_ADDITION);

        $this->setExpectedException(
            '\LogicException',
            'A previous request interceptor should have attached a header to this request'
        );

        $this->controller->getProductAction($this->request);
    }

    public function testGivenThatWePreviouslyAttachedTheXReadingGroupHeaderToTheyWillBeAPartOfTheReturnedArray()
    {
        $this->request->headers->set(HeaderKey::REQUEST_ADDITION, HeaderKey::REQUEST_ADDITION_VALUE);
        $expectedReturn = [
            HeaderKey::REQUEST_ADDITION => HeaderKey::REQUEST_ADDITION_VALUE,
            'product'                   => [
                'id'   => 312,
                'name' => 'A product name'
            ]
        ];

        $actualReturn = $this->controller->getProductAction($this->request);

        $this->assertEquals($expectedReturn, $actualReturn, 'Expected the controller to return an array with the header.');
    }
}
