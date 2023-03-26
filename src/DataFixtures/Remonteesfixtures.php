<?php
// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Remontees;

class Remonteesfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $noms = array('Remontée A', 'Remontée B', 'Remontée C', 'Remontée D', 'Remontée E', 'Remontée F', 'Remontée G', 'Remontée H', 'Remontée I', 'Remontée J',
            'Remontée K', 'Remontée L', 'Remontée M', 'Remontée N', 'Remontée O', 'Remontée P', 'Remontée Q', 'Remontée R', 'Remontée S', 'Remontée T',
            'Remontée U', 'Remontée V', 'Remontée W', 'Remontée X', 'Remontée Y', 'Remontée Z', 'Remontée AA', 'Remontée BB', 'Remontée CC', 'Remontée DD',
            'Remontée EE', 'Remontée FF', 'Remontée GG', 'Remontée HH', 'Remontée II', 'Remontée JJ', 'Remontée KK');

        $types = array('Téléski', 'Télésiège', 'Télécabine');

        for ($i = 0; $i < 39; $i++) {
            $remontee = new Remontees();
            $remontee->setName($noms[array_rand($noms)]);
            $remontee->setType($types[array_rand($types)]);
            $remontee->setOpen(rand(0, 1) == 1 ? true : false);
            $remontee->setHoraire(rand(8, 16) . 'h-' . rand(17, 22) . 'h');
            $remontee->setMessage('Rien à signaler');
            $remontee->setHorairefermeture(rand(16, 20) . 'h-' . rand(21, 23) . 'h');
            $manager->persist($remontee);
        }

        $manager->flush();
    }
}