<?php

// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Station;

class Stationfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $noms = array('Station A', 'Station B', 'Station C');
        $urls = array('https://example.com/logoA.png', 'https://example.com/logoB.png', 'https://example.com/logoC.png');

        for ($i = 0; $i < 2; $i++) {
            $station = new Station();
            $station->setName($noms[$i]);
            $station->setState(rand(0, 1) == 1 ? true : false);
            $station->setNote(rand(50, 100) / 10);
            $station->setLogo($urls[$i]);

            $manager->persist($station);
        }

        $manager->flush();
    }
}