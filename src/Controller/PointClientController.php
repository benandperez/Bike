<?php

namespace App\Controller;

use App\Entity\PointClient;
use App\Form\PointClientType;
use App\Repository\PointClientRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/point/client")
 */
class PointClientController extends AbstractController
{
    /**
     * @Route("/", name="point_client_index", methods={"GET"})
     */
    public function index(PointClientRepository $pointClientRepository): Response
    {
        return $this->render('point_client/index.html.twig', [
            'point_clients' => $pointClientRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="point_client_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pointClient = new PointClient();
        $form = $this->createForm(PointClientType::class, $pointClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pointClient);
            $entityManager->flush();

            return $this->redirectToRoute('point_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('point_client/new.html.twig', [
            'point_client' => $pointClient,
            'form' => $form,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="point_client_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PointClient $pointClient): Response
    {
        $form = $this->createForm(PointClientType::class, $pointClient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('point_client_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('point_client/edit.html.twig', [
            'point_client' => $pointClient,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="point_client_delete", methods={"POST"})
     */
    public function delete(Request $request, PointClient $pointClient): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pointClient->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pointClient);
            $entityManager->flush();
        }

        return $this->redirectToRoute('point_client_index', [], Response::HTTP_SEE_OTHER);
    }
}
