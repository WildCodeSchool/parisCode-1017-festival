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
        $user1->setUsername('root');
        $user1->setEmail('email@gmail.com');
        $user1->setEnabled(1);
        $user1->setPlainPassword('root');
        $user1->setRoles(array('ROLE_ADMIN'));
        $user1->setAddress($this->getReference('Hélène address'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('ln-t');
        $user2->setEmail('gmail@gmail.com');
        $user2->setEnabled(1);
        $user2->setPlainPassword('qwerty');
        $user2->setRoles(array('ROLE_USER'));
        $user2->setAddress($this->getReference('Hélène address'));
        $manager->persist($user2);

        $manager->flush();

        $this->addReference($user1->getUsername(), $user1);
        $this->addReference($user2->getUsername(), $user2);
    }

    public function getDependencies()
    {
        return array(
            LocationFixtures::class
        );
    }


}
