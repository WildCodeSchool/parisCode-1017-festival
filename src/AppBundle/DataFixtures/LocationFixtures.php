<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LocationFixtures
 *
 * @package AppBundle\DataFixtures
 */
class LocationFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $location1 = new Location();
        $location1->setName('Mojo Club');
        $location1->setAddress('Reeperbahn 1, 20359 Hamburg, Allemagne');
        $location1->setLatitude('53.549715');
        $location1->setLongitude('9.967517');
        $manager->persist($location1);

        $location2 = new Location();
        $location2->setName('Elbe Philharmonic Hall');
        $location2->setAddress('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne');
        $location2->setLatitude('53.5412273');
        $location2->setLongitude('9.9818858');
        $manager->persist($location2);

        $location3 = new Location();
        $location3->setName('Reeperbahn');
        $location3->setAddress('Reeperbahn, Hambourg, Allemagne');
        $location3->setLatitude('53.5495698');
        $location3->setLongitude('9.9604257');
        $manager->persist($location3);

        $location4 = new Location();
        $location4->setName('Bateau');
        $location4->setAddress('21 chemin de la Basse Boissière, 78490 Les Mesnuls, France');
        $location4->setLatitude('48.7529251');
        $location4->setLongitude('1.8185477');
        $manager->persist($location4);

        $location5 = new Location();
        $location5->setName('Micronésie');
        $location5->setAddress('Micronésie');
        $location5->setLatitude('5.1729981');
        $location5->setLongitude('141.1805464');
        $manager->persist($location5);

        $location6 = new Location();
        $location6->setName('75014');
        $location6->setAddress('75014 Paris, France');
        $location6->setLatitude('48.8295573');
        $location6->setLongitude('2.2530607');
        $manager->persist($location6);

        $location7 = new Location();
        $location7->setName('75010');
        $location7->setAddress('75010 Paris, France');
        $location7->setLatitude('48.8759426');
        $location7->setLongitude('2.3274349');
        $manager->persist($location7);

        $manager->flush();

        $this->addReference($location1->getAddress(), $location1);
        $this->addReference($location2->getName(), $location2);
        $this->addReference($location3->getAddress(), $location3);
        $this->addReference($location4->getAddress(), $location4);
        $this->addReference($location5->getAddress(), $location5);
        $this->addReference($location6->getAddress(), $location6);
        $this->addReference($location7->getAddress(), $location7);
    }
}
