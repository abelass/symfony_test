<?php

namespace App\Controller;

use App\Entity\Appointement;
use App\Form\AppointementType;
use App\Repository\AppointementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * @Route("/appointement")
 */
class AppointementController extends AbstractController
{
    /**
     * @Route("/", name="appointement_index", methods={"GET"})
     */
    public function index(AppointementRepository $appointementRepository): Response
    {
        return $this->render('appointement/index.html.twig', [
            'appointements' => $appointementRepository->findAll(),
            'title' => 'Appointements',
        ]);
    }

    /**
     * @Route("/new", name="appointement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $appointement = new Appointement();
        $form = $this->createForm(AppointementType::class, $appointement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($appointement);
            $entityManager->flush();

            return $this->redirectToRoute('appointement_index');
        }

        return $this->render('appointement/new.html.twig', [
            'appointement' => $appointement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="appointement_show", methods={"GET"})
     */
    public function show(Appointement $appointement): Response
    {
        if (!$appointement) {
            throw $this->createNotFoundException('The appointement does not exist');
        }
        return $this->render('appointement/show.html.twig', [
            'appointement' => $appointement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="appointement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Appointement $appointement): Response
    {
        $form = $this->createForm(AppointementType::class, $appointement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('appointement_index');
        }

        return $this->render('appointement/edit.html.twig', [
            'appointement' => $appointement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="appointement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Appointement $appointement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$appointement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($appointement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('appointement_index');
    }
}
