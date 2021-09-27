<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Form\BikeType;
use App\Repository\BikeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bike")
 */
class BikeController extends AbstractController
{
    /**
     * @Route("/", name="bike_index", methods={"GET"})
     */
    public function index(BikeRepository $bikeRepository): Response
    {
        return $this->render('bike/index.html.twig', [
            'bikes' => $bikeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", requirements={ "id" : "d+" }, name="bike_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bike = new Bike();
        $form = $this->createForm(BikeType::class, $bike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bike->setCreatedAt(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bike);
            $entityManager->flush();

            return $this->redirectToRoute('bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bike/new.html.twig', [
            'bike' => $bike,
            'form' => $form,
        ]);
    }


    /**
     * @Route("/{id}/edit" , name="bike_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bike $bike): Response
    {
        $form = $this->createForm(BikeType::class, $bike);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bike_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bike/edit.html.twig', [
            'bike' => $bike,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="bike_delete", methods={"POST"})
     */
    public function delete(Request $request, Bike $bike): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bike->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $bike->setStatus(0);
//            $entityManager->remove($bike);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bike_index', [], Response::HTTP_SEE_OTHER);
    }
}
