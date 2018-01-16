<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ArtistFixtures extends Fixture
{
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

        $this->addReference('Ibeyi', $artist1);
        $this->addReference('David August', $artist2);
        $this->addReference('Her', $artist3);
        $this->addReference('Lewis Capaldi', $artist4);
        $this->addReference('Bear\'s Den', $artist5);
    }
}
