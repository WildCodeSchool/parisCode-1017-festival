<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Concert;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ConcertFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $concert1 = new Concert();
        $concert1->setstart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-21T20:00:00+0000'));
        $concert1->setend(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-21T21:00:00+0000'));
        $concert1->setArtist($this->getReference('Ibeyi'));
        $concert1->setLocation($this->getReference('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne'));
        $concert1->setFestival($this->getReference('Reeperbahn Festival'));
        $concert1->setIsValid(1);
        $manager->persist($concert1);

        $concert2 = new Concert();
        $concert2->setstart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-21T23:00:00+0000'));
        $concert2->setend(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-22T00:30:00+0000'));
        $concert2->setArtist($this->getReference('David August'));
        $concert2->setLocation($this->getReference('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne'));
        $concert2->setFestival($this->getReference('Reeperbahn Festival'));
        $concert2->setIsValid(1);
        $manager->persist($concert2);

        $concert3 = new Concert();
        $concert3->setstart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-22T18:00:00+0000'));
        $concert3->setend(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-22T19:00:00+0000'));
        $concert3->setArtist($this->getReference('Her'));
        $concert3->setLocation($this->getReference('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne'));
        $concert3->setFestival($this->getReference('Reeperbahn Festival'));
        $concert3->setIsValid(1);
        $manager->persist($concert3);

        $concert4 = new Concert();
        $concert4->setstart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-22T21:00:00+0000'));
        $concert4->setend(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-22T22:00:00+0000'));
        $concert4->setArtist($this->getReference('Lewis Capaldi'));
        $concert4->setLocation($this->getReference('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne'));
        $concert4->setFestival($this->getReference('Reeperbahn Festival'));
        $concert4->setIsValid(1);
        $manager->persist($concert4);

        $concert5 = new Concert();
        $concert5->setstart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-23T00:00:00+0000'));
        $concert5->setend(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-23T01:10:00+0000'));
        $concert5->setArtist($this->getReference('Bear\'s Den'));
        $concert5->setLocation($this->getReference('Elbe Philharmonic Hall, Platz der Deutschen Einheit 1, 20457 Hambourg, Allemagne'));
        $concert5->setFestival($this->getReference('Reeperbahn Festival'));
        $concert5->setIsValid(1);
        $manager->persist($concert5);

        $manager->flush();

    }

    public function getDependencies()
    {
        return array(
            FestivalFixtures::class,
            ArtistFixtures::class,
            LocationFixtures::class
        );
    }
}
