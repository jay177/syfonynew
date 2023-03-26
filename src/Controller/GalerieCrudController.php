<?php

namespace App\Controller;

use App\Entity\Galerie;
use App\Form\Galerie1Type;
use App\Repository\GalerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/galerie/crud')]
class GalerieCrudController extends AbstractController
{
    #[Route('/', name: 'app_galerie_crud_index', methods: ['GET'])]
    public function index(GalerieRepository $galerieRepository): Response
    {
        return $this->render('galerie_crud/index.html.twig', [
            'galeries' => $galerieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_galerie_crud_new', methods: ['GET', 'POST'])]
    public function new(Request $request, GalerieRepository $galerieRepository): Response
    {
        $galerie = new Galerie();
        $form = $this->createForm(Galerie1Type::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->save($galerie, true);

            return $this->redirectToRoute('app_galerie_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie_crud/new.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_galerie_crud_show', methods: ['GET'])]
    public function show(Galerie $galerie): Response
    {
        return $this->render('galerie_crud/show.html.twig', [
            'galerie' => $galerie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_galerie_crud_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        $form = $this->createForm(Galerie1Type::class, $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $galerieRepository->save($galerie, true);

            return $this->redirectToRoute('app_galerie_crud_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('galerie_crud/edit.html.twig', [
            'galerie' => $galerie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_galerie_crud_delete', methods: ['POST'])]
    public function delete(Request $request, Galerie $galerie, GalerieRepository $galerieRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$galerie->getId(), $request->request->get('_token'))) {
            $galerieRepository->remove($galerie, true);
        }

        return $this->redirectToRoute('app_galerie_crud_index', [], Response::HTTP_SEE_OTHER);
    }
}
