<?php

namespace App\DataFixtures;

use App\Entity\Station;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class StationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 20; $i++) {
            $station = new Station();
            $station->setName($this->getStationName($i));
            $station->setState($this->getStationOpen($i));
            $station->setSchedule($this->getStationSchedule($i));
            $station->setDifficulty($this->getStationDifficulty($i));

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

    private function getStationSchedule(int $index): string
    {
        return "9h00-17h00";
    }

    private function getStationDifficulty(int $index): string
    {
        return "Facile";
    }
}