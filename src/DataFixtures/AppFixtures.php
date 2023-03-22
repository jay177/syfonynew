<?php

namespace App\DataFixtures;

use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $station = new Station();
            $station->setName($this->getStationName($i));
            $station->setState($this->getStationOpen($i));

            $manager->persist($station);
        }

        $manager->flush();
    }

    private function getStationName(int $index): string
    {
        return "Station ".$index;
    }

    private function getStationOpen(int $index): bool
    {
        return true;
    }

}
