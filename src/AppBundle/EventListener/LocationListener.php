<?php

namespace AppBundle\EventListener;

use AppBundle\Entity\Festival;
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

        if (!empty($entity)){
            $location = $this->address->regularGeocoding($entity->getAddress());
            $entity->setName($location['name']);
            $entity->setAddress($location['address']);
            $entity->setLatitude($location['lat']);
            $entity->setLongitude($location['lng']);
        }
    }
}