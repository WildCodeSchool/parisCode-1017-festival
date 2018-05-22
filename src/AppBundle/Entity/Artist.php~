<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Artist
 *
 * @ORM\Table(name="artist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ArtistRepository")
 */
class Artist
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Concert", mappedBy="artist", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $concert;

    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->concert = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name.
     *
     * @param string $name
     *
     * @return Artist
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add concert.
     *
     * @param \AppBundle\Entity\Concert $concert
     *
     * @return Artist
     */
    public function addConcert(\AppBundle\Entity\Concert $concert)
    {
        $this->concert[] = $concert;

        return $this;
    }

    /**
     * Remove concert.
     *
     * @param \AppBundle\Entity\Concert $concert
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeConcert(\AppBundle\Entity\Concert $concert)
    {
        return $this->concert->removeElement($concert);
    }

    /**
     * Get concert.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConcert()
    {
        return $this->concert;
    }
}
