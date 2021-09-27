<?php

namespace App\Controller;

use App\Entity\BikeType;
use App\Form\BikeTypeType;
use App\Repository\BikeTypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bike/type")
 */
class BikeTypeController extends AbstractController
{
    /**
     * @Route("/", name="bike_type_index", methods={"GET"})
     */
    public function index(BikeTypeRepository $bikeTypeRepository): Response
    {
        return $this->render('bike_type/index.html.twig', [
            'bike_types' => $bikeTypeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="bike_type_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bikeType = new BikeType();
        $form = $this->createForm(BikeTypeType::class, $bikeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bikeType);
            $entityManager->flush();

            return $this->redirectToRoute('bike_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bike_type/new.html.twig', [
            'bike_type' => $bikeType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bike_type_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, BikeType $bikeType): Response
    {
        $form = $this->createForm(BikeTypeType::class, $bikeType);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bike_type_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bike_type/edit.html.twig', [
            'bike_type' => $bikeType,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bike_type_delete", methods={"POST"})
     */
    public function delete(Request $request, BikeType $bikeType): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bikeType->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $bikeType->setStatus(0);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bike_type_index', [], Response::HTTP_SEE_OTHER);
    }
}
