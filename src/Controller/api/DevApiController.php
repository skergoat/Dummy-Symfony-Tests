<?php

namespace App\Controller\api;

use App\Repository\DeveloperRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DevApiController extends AbstractController
{
    /**
     * @Route("/api/dev", name="dev_api")
     */
    public function index(DeveloperRepository $respository, SerializerInterface $serializer)
    {
        $dev = $respository->findAll();
        $dev = $serializer->serialize($dev, 'json');
        return new Response($dev, 200, ['Content-Type' => 'application/json']);
    }

    /**
     * @Route("/api/dev/{id}", name="show_api")
     */
    public function show(DeveloperRepository $respository, SerializerInterface $serializer, $id)
    {
        $dev = $respository->findOneBy(['id' => $id]);
        $dev = $serializer->serialize($dev, 'json');
        return new Response($dev, 200, ['Content-Type' => 'application/json']);
    }
}
