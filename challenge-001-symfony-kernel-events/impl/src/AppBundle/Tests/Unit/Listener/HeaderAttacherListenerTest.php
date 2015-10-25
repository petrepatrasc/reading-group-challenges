<?php


namespace AppBundle\Tests\Unit\Listener;


use AppBundle\Enum\HeaderKey;
use AppBundle\Listener\HeaderAttacherListener;
use Symfony\Component\HttpFoundation\Request;

/**
 * Tests the functionality of the header attacher in isolation.
 *
 * @package AppBundle\Tests\Unit\Listener
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class HeaderAttacherListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HeaderAttacherListener
     */
    protected $listener;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->listener = new HeaderAttacherListener();
    }

    public function testGivenAValidRequestObjectThenTheListenerWillAttachAHeaderOntoIt()
    {
        $request = Request::create('test-url');

        $event = $this->getMockBuilder('Symfony\Component\HttpKernel\Event\GetResponseEvent')
            ->disableOriginalConstructor()
            ->getMock();
        $event->expects($this->once())->method('getRequest')->willReturn($request);

        $this->listener->onKernelRequest($event);

        $this->assertTrue($request->headers->has(HeaderKey::REQUEST_ADDITION), 'Header key was not added to the request headers.');
        $this->assertEquals(HeaderKey::REQUEST_ADDITION_VALUE, $request->headers->get(HeaderKey::REQUEST_ADDITION), 'The header key was added to the request headers, but it does not contain the appropriate value.');
    }
}
