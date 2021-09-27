<?php

namespace App\Controller;

use App\Entity\PointClient;
use App\Entity\Rent;
use App\Form\RentType;
use App\Repository\RentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/rent")
 */
class RentController extends AbstractController
{
    /**
     * @Route("/", name="rent_index", methods={"GET"})
     */
    public function index(RentRepository $rentRepository): Response
    {
        return $this->render('rent/index.html.twig', [
            'rents' => $rentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="rent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $rent = new Rent();
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pointClient = new PointClient();


            $days = $form->getData()->getDays();
            $total = $form->getData()->getBikeType()->getTypeMembership()->getCost() * $days;

            $entityManager = $this->getDoctrine()->getManager();
            $rent->setStatus(1);
            $rent->setTotal($total);
            $rent->setDate(new \DateTime());

            $foo = $form->getData()->getBikeType()->getDescription();

            $pointClient->setClient($form->getData()->getClient());
            $pointClient->setPoint(1);
            if (strpos($foo, 'electricas') !== false) {
                $pointClient->setPoint(2);
            }
            $pointClient->setCreatedAt(new \DateTime());
            $pointClient->setUpdatedAt(new \DateTime());
            $entityManager->persist($rent);
            $entityManager->persist($pointClient);

            $entityManager->flush();

            return $this->redirectToRoute('rent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rent/new.html.twig', [
            'rent' => $rent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="rent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Rent $rent): Response
    {
        $form = $this->createForm(RentType::class, $rent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rent_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rent/edit.html.twig', [
            'rent' => $rent,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="rent_delete", methods={"POST"})
     */
    public function delete(Request $request, Rent $rent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $rent->setStatus(0);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rent_index', [], Response::HTTP_SEE_OTHER);
    }
}
