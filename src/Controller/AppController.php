<?php

namespace App\Controller;

use App\Repository\GalerieRepository;
use App\Repository\PisteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(PisteRepository $PisteRepository): Response
    {
        $pistes = $PisteRepository->findAll();

        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'pistes'=> $pistes,
        ]);
    }

    #[Route('/galerie', name: 'app_galerie')]
    public function galerie(GalerieRepository $galerieRepository): Response
    {
        $galeries = $galerieRepository->findAll();

        return $this->render('app/galerie.html.twig', [
            'galeries' => $galeries,
        ]);

    }

<<<<<<< Updated upstream
    #[Route('/galerie/{id}', name: 'app_image')]
    public function image($id, GalerieRepository $galerieRepository): Response
    {
        $images = $galerieRepository ->find($id);

        if (!$images){
            throw $this->createNotFoundException('Image not found');
        }

        return $this->render('app/image.html.twig', [
            'images' => $images,
        ]);
    }
=======

>>>>>>> Stashed changes
}
