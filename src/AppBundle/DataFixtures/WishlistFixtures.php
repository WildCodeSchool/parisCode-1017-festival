<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Wishlist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class WishlistFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $wishlist1 = new Wishlist();
        $wishlist1->setUser($this->getReference('Hélène'));
        $wishlist1->addLocation($this->getReference('Mojo Club'));
        $wishlist1->addFestival($this->getReference('Reeperbahn Festival'));
        $wishlist1->addArtist($this->getReference('Her'));
        $wishlist1->addArtist($this->getReference('Bear\'s Den'));
        $wishlist1->addGenre($this->getReference('General'));
        $manager->persist($wishlist1);

        $manager->flush();

        $this->addReference('Wishlist 1', $wishlist1);
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            ArtistFixtures::class,
            LocationFixtures::class,
            GenreFixtures::class,
            FestivalFixtures::class
        );
    }
}
