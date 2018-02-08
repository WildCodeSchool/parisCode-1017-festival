<?php

namespace AppBundle\EventListener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Location;
use AppBundle\Services\GoogleMaps;

class LocationListener
{
    private $address;

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

        $location = $this->address->regularGeocoding($entity->getAddress());

        $entity->setLatitude($location['lat']);
        $entity->setLongitude($location['lng']);
    }
}