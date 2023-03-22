<?php

namespace App\DataFixtures;

use App\Entity\Remontées;
use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RemontéesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $station = new Station();
        $station->setName('Station A');
        $manager->persist($station);

        for ($i = 0; $i < 20; $i++) {
            $remontée = new Remontées();
            $remontée->setName('Remontée ' . $i);
            $remontée->setType('Type ' . $i % 3);
            $remontée->setOpen($i % 2 == 0);
            $remontée->setHoraire('9h - 16h');
            $remontée->setMessage('Message ' . $i);
            $remontée->setStation($station);

            $manager->persist($remontée);
        }

        $manager->flush();
    }
}