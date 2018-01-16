<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Concert
 *
 * @ORM\Table(name="concert")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ConcertRepository")
 */
class Concert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateStart", type="datetime", nullable=true)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEnd", type="datetime", nullable=true)
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Artist", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $artist;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Festival", inversedBy="concert")
     * @ORM\JoinColumn(nullable=false)
     */
    private $festival;

    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return $this->festival . " + " . $this->artist;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateStart.
     *
     * @param \DateTime|null $dateStart
     *
     * @return Concert
     */
    public function setDateStart($dateStart = null)
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    /**
     * Get dateStart.
     *
     * @return \DateTime|null
     */
    public function getDateStart()
    {
        return $this->dateStart;
    }

    /**
     * Set dateEnd.
     *
     * @param \DateTime|null $dateEnd
     *
     * @return Concert
     */
    public function setDateEnd($dateEnd = null)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd.
     *
     * @return \DateTime|null
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Set artist.
     *
     * @param \AppBundle\Entity\Artist $artist
     *
     * @return Concert
     */
    public function setArtist(\AppBundle\Entity\Artist $artist)
    {
        $this->artist = $artist;

        return $this;
    }

    /**
     * Get artist.
     *
     * @return \AppBundle\Entity\Artist
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Set location.
     *
     * @param \AppBundle\Entity\Location|null $location
     *
     * @return Concert
     */
    public function setLocation(\AppBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return \AppBundle\Entity\Location|null
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set festival.
     *
     * @param \AppBundle\Entity\Festival $festival
     *
     * @return Concert
     */
    public function setFestival(\AppBundle\Entity\Festival $festival)
    {
        $this->festival = $festival;

        return $this;
    }

    /**
     * Get festival.
     *
     * @return \AppBundle\Entity\Festival
     */
    public function getFestival()
    {
        return $this->festival;
    }
}
