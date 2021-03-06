<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\User;
use AppBundle\Entity\Wishlist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

/**
 * Class UserFixtures
 *
 * @package AppBundle\DataFixtures
 */
class UserFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     * @throws \Doctrine\Common\DataFixtures\BadMethodCallException
     */
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('root');
        $user1->setEmail('root@gmail.com');
        $user1->setEnabled(1);
        $user1->setPlainPassword('root');
        $user1->setRoles(array('ROLE_ADMIN'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setUsername('amandine');
        $user2->setEmail('amandine@gmail.com');
        $user2->setEnabled(1);
        $user2->setPlainPassword('amandine');
        $user2->setRoles(array('ROLE_USER'));
        $manager->persist($user2);

        $user3 = new User();
        $user3->setUsername('agathe');
        $user3->setEmail('agathe@gmail.com');
        $user3->setEnabled(1);
        $user3->setPlainPassword('agathe');
        $user3->setRoles(array('ROLE_USER'));
        $manager->persist($user3);

        $user4 = new User();
        $user4->setUsername('maxime');
        $user4->setEmail('maxime@gmail.com');
        $user4->setEnabled(1);
        $user4->setPlainPassword('maxime');
        $user4->setRoles(array('ROLE_USER'));
        $manager->persist($user4);

        $user5 = new User();
        $user5->setUsername('ln-t');
        $user5->setEmail('ln-t@gmail.com');
        $user5->setEnabled(1);
        $user5->setPlainPassword('ln-t');
        $user5->setRoles(array('ROLE_USER'));
        $manager->persist($user5);

        $manager->flush();

        $this->addReference($user1->getUsername(), $user1);
        $this->addReference($user2->getUsername(), $user2);
        $this->addReference($user3->getUsername(), $user3);
        $this->addReference($user4->getUsername(), $user4);
        $this->addReference($user5->getUsername(), $user5);
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            LocationFixtures::class
        );
    }


}
