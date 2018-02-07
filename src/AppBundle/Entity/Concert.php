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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="datetime", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="datetime", nullable=true)
     */
    private $end;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Artist", inversedBy="concert", cascade={"persist"})
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
     * @var bool
     *
     * @ORM\Column(name="isCancelled", type="boolean", nullable=true)
     */
    private $isCancelled;


    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Concert constructor.
     */
    public function __construct()
    {
        $this->isCancelled = false;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return \DateTime
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd($end)
    {
        $this->end = $end;
    }

    /**
     * @return mixed
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * @param mixed $artist
     */
    public function setArtist($artist)
    {
        $this->artist = $artist;
        $this->title = $this->artist . " @ " . $this->festival;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getFestival()
    {
        return $this->festival;
    }

    /**
     * @param mixed $festival
     */
    public function setFestival($festival)
    {
        $this->festival = $festival;
    }

    /**
     * @return bool
     */
    public function isCancelled()
    {
        return $this->isCancelled;
    }

    /**
     * @param bool $isCancelled
     */
    public function setIsCancelled($isCancelled)
    {
        $this->isCancelled = $isCancelled;
    }

}
