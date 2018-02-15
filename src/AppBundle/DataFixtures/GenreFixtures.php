<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class GenreFixtures
 *
 * @package AppBundle\DataFixtures
 */
class GenreFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
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

        $this->addReference($genre1->getName(), $genre1);
        $this->addReference($genre2->getName(), $genre2);
        $this->addReference($genre3->getName(), $genre3);
    }
}
