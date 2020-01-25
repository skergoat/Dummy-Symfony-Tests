<?php

namespace App\EventSubscriber;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class DeveloperSubscriber implements EventSubscriberInterface
{
    // public function onKernelException(ExceptionEvent $event)
    // {
    //     $exception = $event->getThrowable();
    //     $data = [
    //         'status' => $exception->getStatusCode(),
    //         'message' => 'Resource not found'
    //     ];
        
    //     $response = new JsonResponse($data);
    //     $event->setResponse($response);
    // }

    // public static function getSubscribedEvents()
    // {
    //     return [
    //         'kernel.exception' => 'onKernelException',
    //     ];
    // }
}
