<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Location;
use AppBundle\Services\GoogleMaps;

class LocationListener
{
    // DOC : https://symfony.com/doc/current/controller/upload_file.html

    private $address;
    private $container;

    public function __construct(GoogleMaps $address)
    {
        $this->address = $address;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->regularGeocoding($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->regularGeocoding($entity);
    }

    private function regularGeocoding($entity)
    {
        // conversion only works for Location
        if (!$entity instanceof Location) {
            return;
        }

        $location = $this->address->nameGeocoding($entity->getAddress());

        if ($location != 'error'){
            $entity->setName($location['name']);
            $entity->setLatitude($location['lat']);
            $entity->setLongitude($location['lng']);
        } else {
            $entity->setName('Unknown address');
            $entity->setAddress('');
            $entity->setLatitude(48.864716);
            $entity->setLongitude(2.349014);
        }
    }
}