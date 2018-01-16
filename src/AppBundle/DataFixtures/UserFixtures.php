<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use AppBundle\Entity\Wishlist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('Hélène');
        $user1->setPassword('password');
        $user1->setEmail('email@gmail.com');
        $user1->setAddress($this->getReference('Hélène address'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('Amandine');
        $user2->setPassword('password');
        $user2->setEmail('email@gmail.com');
        $user2->setAddress($this->getReference('Amandine address'));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('Agathe');
        $user3->setPassword('password');
        $user3->setEmail('email@gmail.com');
        $user3->setAddress($this->getReference('Agathe address'));
        $manager->persist($user3);

        $manager->flush();

        $this->addReference('Hélène', $user1);
        $this->addReference('Amandine', $user2);
        $this->addReference('Agathe', $user3);
    }

    public function getDependencies()
    {
        return array(
            LocationFixtures::class
        );
    }


}
