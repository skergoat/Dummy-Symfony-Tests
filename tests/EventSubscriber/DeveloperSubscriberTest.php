<?php

use App\Service\countDeveloperPrice;
use App\EventSubscriber\DeveloperSubscriber;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DeveloperSubscriberTest extends WebTestCase
{

    private $event;

    public function setUp()
    {
        $this->event = $this->getMockBuilder('Symfony\Component\HttpKernel\Event\ExceptionEvent')
                                ->disableOriginalConstructor()
                                ->setMethods(['getThrowable'])
                                ->getMock();
                
        $this->throwable = $this->getMockBuilder('Symfony\Component\HttpKernel\Exception\NotFoundHttpException')
                                ->disableOriginalConstructor()
                                ->setMethods(['getStatusCode'])
                                ->getMock();
    }

    public function testOnKernelException()
    {
        $event = $this->event->method("getThrowable")->willReturn($this->throwable);
        $throwable = $this->throwable->method("getStatusCode")->willReturn(404);

        $subscriber = new DeveloperSubscriber();
        $subscriber->onKernelException($this->event);
        
        $this->assertEquals('Symfony\Component\HttpFoundation\JsonResponse', get_class($this->event->getResponse()));
    }
}