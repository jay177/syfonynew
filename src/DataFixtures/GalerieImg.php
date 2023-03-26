<?php

namespace App\DataFixtures;

use App\Entity\Galerie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GalerieImg extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $galerie = new Galerie();
            $galerie->setDescription("Description de la l'image $i");
            $galerie->setTitre("Titre de l'image $i");
            $galerie->setImageUrl("https://www.haute-maurienne-vanoise.com/content/uploads/sites/5/2022/12/valcenis_lac_cenis.jpg");
            $manager->persist($galerie);
        }

        $manager->flush();
    }
}
