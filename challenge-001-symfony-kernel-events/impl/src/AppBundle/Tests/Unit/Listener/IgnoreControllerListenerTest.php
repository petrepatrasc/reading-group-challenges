<?php


namespace AppBundle\Tests\Unit\Listener;


use AppBundle\Controller\CatchableController;
use AppBundle\Controller\RegularController;
use AppBundle\Controller\RewrittenController;
use AppBundle\Listener\IgnoreControllerListener;

/**
 * Tests the controler ignoring workflow in isolation.
 *
 * @package AppBundle\Tests\Unit\Listener
 * @author  Petre Pătrașc <petre@dreamlabs.ro>
 */
class IgnoreControllerListenerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var IgnoreControllerListener
     */
    private $listener;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $filterControllerEvent;

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->filterControllerEvent = $this->getMockBuilder('Symfony\Component\HttpKernel\Event\FilterControllerEvent')
            ->disableOriginalConstructor()
            ->getMock();

        $this->listener = new IgnoreControllerListener();
    }

    public function testGivenARequestToANonCatchableControllerThenControllerWillNotBeOverwritten()
    {
        $controllerWrapper = $this->getNonCatchableController();

        $this->filterControllerEvent->expects($this->once())->method('getController')->willReturn($controllerWrapper);
        $this->filterControllerEvent->expects($this->never())->method('setController');

        $this->listener->onKernelController($this->filterControllerEvent);
    }

    public function testGivenARequestToACatchableControllerThenTheControllerAndActionWillBeOverwritten()
    {
        $controllerWrapper = $this->getCatchableController();
        $controllerWrapperOverwrite = $this->getCatchableControllerOverwrite();

        $this->filterControllerEvent->expects($this->once())->method('getController')->willReturn($controllerWrapper);
        $this->filterControllerEvent->expects($this->once())->method('setController')->with($controllerWrapperOverwrite);

        $this->listener->onKernelController($this->filterControllerEvent);
    }

    /**
     * @return array
     */
    private function getNonCatchableController()
    {
        $controller        = new RegularController();
        $action            = 'indexAction';
        $controllerWrapper = [$controller, $action];

        return $controllerWrapper;
    }

    /**
     * @return array
     */
    private function getCatchableController()
    {
        $controller        = new CatchableController();
        $action            = 'indexAction';
        $controllerWrapper = [$controller, $action];

        return $controllerWrapper;
    }

    /**
     * @return array
     */
    private function getCatchableControllerOverwrite()
    {
        $controller        = new RewrittenController();
        $action            = 'capturedAction';
        $controllerWrapper = [$controller, $action];

        return $controllerWrapper;
    }
}
