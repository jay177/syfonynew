<?php

namespace App\Controller;

use App\Repository\GalerieRepository;
use App\Repository\PisteRepository;
use App\Repository\RemonteesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    #[Route('/', name: 'app_app')]
    public function index(PisteRepository $PisteRepository, RemonteesRepository $remonteesRepository): Response
    {

        $pistes = $PisteRepository->findAll();
        $remontees = $remonteesRepository->findAll();


        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
            'pistes'=> $pistes,
            'remontees'=> $remontees,
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



}
