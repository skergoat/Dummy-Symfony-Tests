<?php

namespace App\Controller;

use App\Entity\Developer;
use App\Form\DeveloperType;
use App\Service\countDeveloperPrice;
use App\Repository\DeveloperRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/developer")
 */
class DeveloperController extends AbstractController
{

    /**
     * @Route("/", name="developer_index", methods={"GET"})
     */
    public function index(DeveloperRepository $developerRepository, countDeveloperPrice $count): Response
    {
        $developer = $developerRepository->findAll();

        foreach($developer as $dev) {
            $dev->setPrice($count->returnPrice($dev->getExperience()));
        }

        return $this->render('developer/index.html.twig', [
            'developers' => $developer,
        ]);
    }

    /**
     * @Route("/new", name="developer_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $developer = new Developer();
        $form = $this->createForm(DeveloperType::class, $developer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($developer);
            $entityManager->flush();

            return $this->redirectToRoute('developer_index');
        }

        return $this->render('developer/new.html.twig', [
            'developer' => $developer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="developer_show", methods={"GET"})
     */
    public function show(Developer $developer, countDeveloperPrice $count): Response
    {
        $developer->setPrice($count->returnPrice($developer->getExperience()));

        return $this->render('developer/show.html.twig', [
            'developer' => $developer,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="developer_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Developer $developer): Response
    {
        $form = $this->createForm(DeveloperType::class, $developer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('developer_index');
        }

        return $this->render('developer/edit.html.twig', [
            'developer' => $developer,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="developer_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Developer $developer): Response
    {
        if ($this->isCsrfTokenValid('delete'.$developer->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($developer);
            $entityManager->flush();
        }

        return $this->redirectToRoute('developer_index');
    }


}
