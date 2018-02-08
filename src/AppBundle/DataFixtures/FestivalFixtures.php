<?php

namespace AppBundle\DataFixtures;

use AppBundle\Entity\Festival;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FestivalFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $festival1 = new Festival();
        $festival1->setTitle('Reeperbahn Festival');
        $festival1->setDescription('The Reeperbahn Festival is a music festival held in Hamburg, Germany over 4 days at the end of September.');
        $festival1->setStart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-19T00:00:00+0000'));
        $festival1->setEnd(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-23T01:10:00+0000'));
        $festival1->setBudget(99);
        $festival1->setLinkWebsite('http://www.reeperbahnfestival.com');
        $festival1->setLinkFbPage('https://www.facebook.com/reeperbahnfestival/');
        $festival1->setLinkFbEvent('https://www.facebook.com/events/165917984004747/');
        $festival1->setLinkInstagram('https://www.instagram.com/reeperbahn_festival/');
        $festival1->setLinkTickets('https://www.reeperbahnfestival.com/en/tickets');
        $festival1->setImageIcon('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/24174179_10156009503503000_2218269298435332860_n.jpg?oh=dfd88081ae98f63e7a1376339e680140&oe=5AF13320');
        $festival1->setImageBanner('https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/reeperbahn_festival.jpg');
        $festival1->setIsCancelled(0);
        $festival1->setIsSoldOut(0);
        $festival1->setIsValid(0);
        $festival1->setLocation($this->getReference('Reeperbahn, Hambourg, Allemagne'));
        $festival1->setGenre($this->getReference('General'));
        $manager->persist($festival1);

        $festival2 = new Festival();
        $festival2->setTitle('Bateau Music Festival');
        $festival2->setDescription('...');
        $festival2->setLocation($this->getReference('21 chemin de la Basse Boissière, 78490 Les Mesnuls, France'));
        $festival2->setGenre($this->getReference('General'));
        $festival2->setLinkWebsite('http://www.bateaumusic.com');
        $festival2->setLinkFbPage('https://www.facebook.com/bateaumusic');;
        $festival2->setImageIcon('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/16864557_1276073765846890_1246899853149261249_n.png?oh=3107e54e3468a5d58c61eb4e1ba779e2&oe=5AB20A60');
        $festival2->setImageBanner('https://cdn.2017bestnine.com/user_images/bateau.music.jpg');
        $manager->persist($festival2);

        $festival3 = new Festival();
        $festival3->setTitle('Dummy 1');
        $festival3->setDescription('The Reeperbahn Festival is a music festival held in Hamburg, Germany over 4 days at the end of September.');
        $festival3->setStart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-19T00:00:00+0000'));
        $festival3->setEnd(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-23T01:10:00+0000'));
        $festival3->setBudget(99);
        $festival3->setLinkWebsite('http://www.reeperbahnfestival.com');
        $festival3->setLinkFbPage('https://www.facebook.com/reeperbahnfestival/');
        $festival3->setLinkFbEvent('https://www.facebook.com/events/165917984004747/');
        $festival3->setLinkInstagram('https://www.instagram.com/reeperbahn_festival/');
        $festival3->setLinkTickets('https://www.reeperbahnfestival.com/en/tickets');
        $festival3->setImageIcon('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/24174179_10156009503503000_2218269298435332860_n.jpg?oh=dfd88081ae98f63e7a1376339e680140&oe=5AF13320');
        $festival3->setImageBanner('https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/reeperbahn_festival.jpg');
        $festival3->setIsCancelled(0);
        $festival3->setIsSoldOut(0);
        $festival3->setIsValid(0);
        $festival3->setLocation($this->getReference('75014 Paris, France'));
        $festival3->setGenre($this->getReference('General'));
        $manager->persist($festival3);

        $festival4 = new Festival();
        $festival4->setTitle('Dummy 2');
        $festival4->setDescription('The Reeperbahn Festival is a music festival held in Hamburg, Germany over 4 days at the end of September.');
        $festival4->setStart(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-19T00:00:00+0000'));
        $festival4->setEnd(\DateTime::createFromFormat("Y-m-d\TH:i:sO", '2018-09-23T01:10:00+0000'));
        $festival4->setBudget(99);
        $festival4->setLinkWebsite('http://www.reeperbahnfestival.com');
        $festival4->setLinkFbPage('https://www.facebook.com/reeperbahnfestival/');
        $festival4->setLinkFbEvent('https://www.facebook.com/events/165917984004747/');
        $festival4->setLinkInstagram('https://www.instagram.com/reeperbahn_festival/');
        $festival4->setLinkTickets('https://www.reeperbahnfestival.com/en/tickets');
        $festival4->setImageIcon('https://scontent-cdg2-1.xx.fbcdn.net/v/t1.0-9/24174179_10156009503503000_2218269298435332860_n.jpg?oh=dfd88081ae98f63e7a1376339e680140&oe=5AF13320');
        $festival4->setImageBanner('https://2017bestnine.s3-us-west-2.amazonaws.com/user_images/reeperbahn_festival.jpg');
        $festival4->setIsCancelled(0);
        $festival4->setIsSoldOut(0);
        $festival4->setIsValid(0);
        $festival4->setLocation($this->getReference('75010 Paris, France'));
        $festival4->setGenre($this->getReference('General'));
        $manager->persist($festival4);

        $manager->flush();

        $this->addReference($festival1->getTitle(), $festival1);
        $this->addReference($festival2->getTitle(), $festival2);
        $this->addReference($festival3->getTitle(), $festival3);
        $this->addReference($festival4->getTitle(), $festival4);
    }

    public function getDependencies()
    {
        return array(
            GenreFixtures::class,
            LocationFixtures::class
        );
    }

}
