<?php

namespace App\DataFixtures;

use App\Entity\City;
use App\Entity\Flight;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use phpDocumentor\Reflection\Types\Boolean;

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


        for($i=0;$i<=3;$i++):
            $flight = new Flight;
            $flight
                ->setNumero('HG5687')
                ->setSchedule(\DateTime::createFromFormat('H:i','08:00'))
                ->setPrice(mt_rand(100,500))
                ->setSeat(mt_rand(1,50))
                ->setReduction(false)
                ->setDeparture($tabObjCity[$i])
                ->setArrival($tabObjCity[$i+1]);
            $manager->persist($flight);
        endfor;

        $manager->flush();
        
    }
}
