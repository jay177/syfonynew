<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Piste;


class PisteFixtures extends Fixture

{
    public function load(ObjectManager $manager)
    {
        $noms = array('Piste A', 'Piste B', 'Piste C', 'Piste D', 'Piste E', 'Piste F', 'Piste G', 'Piste H', 'Piste I', 'Piste J',
            'Piste K', 'Piste L', 'Piste M', 'Piste N', 'Piste O', 'Piste P', 'Piste Q', 'Piste R', 'Piste S', 'Piste T',
            'Piste U', 'Piste V', 'Piste W', 'Piste X', 'Piste Y', 'Piste Z');

        $couleurs = array('Vert', 'Bleu', 'Rouge', 'Noir');

        for ($i = 0; $i < 50; $i++) {
            $piste = new Piste();
            $piste->setName($noms[array_rand($noms)]);
            $piste->setOuvert(rand(0, 1) == 1 ? true : false);
            $piste->setHoraire(rand(8, 16) . 'h-' . rand(17, 22) . 'h');
            $piste->setDificulte($couleurs[array_rand($couleurs)]);
            $piste->setAlerte('Rien à signaler');
            $piste->setAlpNord(rand(0, 1) == 1 ? true : false);

            $manager->persist($piste);
        }

        $manager->flush();
    }
}
