<?php

namespace App\DataFixtures;

use App\Entity\Remontees;
use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $station = new Station();
        $station->setName('Station A');
        $manager->persist($station);

        for ($i = 0; $i < 20; $i++) {
            $remontee = new Remontees();
            $remontee->setName('Remontee ' . $i);
            $remontee->setType('Type ' . $i % 3);
            $remontee->setOpen($i % 2 == 0);
            $remontee->setHoraire('9h - 16h');
            $remontee->setMessage('Message ' . $i);
            $remontee->setStation($station);

            $manager->persist($remontee);
        }

        $manager->flush();
    }

}
