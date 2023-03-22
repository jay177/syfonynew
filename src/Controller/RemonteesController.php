<?php

namespace App\Controller;

use App\Entity\Remontees;
use App\Form\RemonteesType;
use App\Repository\RemonteesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/remontees')]
class RemonteesController extends AbstractController
{
    #[Route('/', name: 'app_remontees_index', methods: ['GET'])]
    public function index(RemonteesRepository $remonteesRepository): Response
    {
        return $this->render('remontees/index.html.twig', [
            'remontees' => $remonteesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_remontees_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RemonteesRepository $remonteesRepository): Response
    {
        $remontee = new Remontees();
        $form = $this->createForm(RemonteesType::class, $remontee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remonteesRepository->save($remontee, true);

            return $this->redirectToRoute('app_remontees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remontees/new.html.twig', [
            'remontee' => $remontee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remontees_show', methods: ['GET'])]
    public function show(Remontees $remontee): Response
    {
        return $this->render('remontees/show.html.twig', [
            'remontee' => $remontee,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_remontees_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Remontees $remontee, RemonteesRepository $remonteesRepository): Response
    {
        $form = $this->createForm(RemonteesType::class, $remontee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remonteesRepository->save($remontee, true);

            return $this->redirectToRoute('app_remontees_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remontees/edit.html.twig', [
            'remontee' => $remontee,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remontees_delete', methods: ['POST'])]
    public function delete(Request $request, Remontees $remontee, RemonteesRepository $remonteesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remontee->getId(), $request->request->get('_token'))) {
            $remonteesRepository->remove($remontee, true);
        }

        return $this->redirectToRoute('app_remontees_index', [], Response::HTTP_SEE_OTHER);
    }
}
