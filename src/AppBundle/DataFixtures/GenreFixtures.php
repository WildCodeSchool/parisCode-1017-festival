<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $genre1 = new Genre();
        $genre1->setName("General");
        $manager->persist($genre1);

        $genre2 = new Genre();
        $genre2->setName("Pop");
        $manager->persist($genre2);

        $genre3 = new Genre();
        $genre3->setName("Rock");
        $manager->persist($genre3);

        $manager->flush();

        $this->addReference('General', $genre1);
        $this->addReference('Pop', $genre2);
        $this->addReference('Rock', $genre3);
    }
}
