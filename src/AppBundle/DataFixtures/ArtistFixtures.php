<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class ArtistFixtures
 *
 * @package AppBundle\DataFixtures
 */
class ArtistFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $artist1 = new Artist();
        $artist1->setName('Ibeyi');
        $manager->persist($artist1);

        $artist2 = new Artist();
        $artist2->setName('David August');
        $manager->persist($artist2);

        $artist3 = new Artist();
        $artist3->setName('Her');
        $manager->persist($artist3);

        $artist4 = new Artist();
        $artist4->setName('Lewis Capaldi');
        $manager->persist($artist4);

        $artist5 = new Artist();
        $artist5->setName('Bear\'s Den');
        $manager->persist($artist5);

        $manager->flush();

        $this->addReference($artist1->getName(), $artist1);
        $this->addReference($artist2->getName(), $artist2);
        $this->addReference($artist3->getName(), $artist3);
        $this->addReference($artist4->getName(), $artist4);
        $this->addReference($artist5->getName(), $artist5);
    }
}
