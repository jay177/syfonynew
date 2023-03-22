<?php

namespace App\Controller;

use App\Entity\Remontées;
use App\Form\RemontéesType;
use App\Repository\RemontéesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/remont/es')]
class RemontéesController extends AbstractController
{
    #[Route('/', name: 'app_remont_es_index', methods: ['GET'])]
    public function index(RemontéesRepository $remontéesRepository): Response
    {
        return $this->render('remontées/index.html.twig', [
            'remont_es' => $remontéesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_remont_es_new', methods: ['GET', 'POST'])]
    public function new(Request $request, RemontéesRepository $remontéesRepository): Response
    {
        $remontée = new Remontées();
        $form = $this->createForm(RemontéesType::class, $remontée);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remontéesRepository->save($remontée, true);

            return $this->redirectToRoute('app_remont_es_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remontées/new.html.twig', [
            'remont_e' => $remontée,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remont_es_show', methods: ['GET'])]
    public function show(Remontées $remontée): Response
    {
        return $this->render('remontées/show.html.twig', [
            'remont_e' => $remontée,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_remont_es_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Remontées $remontée, RemontéesRepository $remontéesRepository): Response
    {
        $form = $this->createForm(RemontéesType::class, $remontée);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $remontéesRepository->save($remontée, true);

            return $this->redirectToRoute('app_remont_es_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('remontées/edit.html.twig', [
            'remont_e' => $remontée,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_remont_es_delete', methods: ['POST'])]
    public function delete(Request $request, Remontées $remontée, RemontéesRepository $remontéesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$remontée->getId(), $request->request->get('_token'))) {
            $remontéesRepository->remove($remontée, true);
        }

        return $this->redirectToRoute('app_remont_es_index', [], Response::HTTP_SEE_OTHER);
    }
}
