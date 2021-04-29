<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Flight;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $city = [
            'Paris',
            'Londres',
            'Berlin',
            'Rome',
            'Madrid'
        ];
        
        foreach ($city as $c) {
            $cit= new City;
            $cit->setName($c);
            $tabObjCity[] = $cit;
            $manager->persist($cit);
        }

        $flight = new Flight;
        $flight
            ->setNumero('HG5687')
            ->setSchedule(\DateTime::createFromFormat('H:i','08:00'))
            ->setPrice(315)
            ->setReduction(false)
            ->setDeparture($tabObjCity[2])
            ->setArrival($tabObjCity[3]);

        $manager->persist($flight);

        $manager->flush();

    }
}
