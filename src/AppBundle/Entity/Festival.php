<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festival
 *
 * @ORM\Table(name="festival")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FestivalRepository")
 */
class Festival
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=250)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start", type="date", nullable=true)
     */
    private $start;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end", type="date", nullable=true)
     */
    private $end;

    /**
     * @var float
     *
     * @ORM\Column(name="budget", type="float", nullable=true)
     */
    private $budget;

    /**
     * @var string
     *
     * @ORM\Column(name="linkWebsite", type="string", length=250, nullable=true)
     */
    private $linkWebsite;

    /**
     * @var string
     *
     * @ORM\Column(name="linkFbEvent", type="string", length=250, nullable=true)
     */
    private $linkFbEvent;

    /**
     * @var string
     *
     * @ORM\Column(name="linkFbPage", type="string", length=250, nullable=true)
     */
    private $linkFbPage;

    /**
     * @var string
     *
     * @ORM\Column(name="linkInstagram", type="string", length=250, nullable=true)
     */
    private $linkInstagram;

    /**
     * @var string
     *
     * @ORM\Column(name="linkTickets", type="string", length=250, nullable=true)
     */
    private $linkTickets;

    /**
     * @var string
     *
     * @ORM\Column(name="imageIcon", type="string", length=250, nullable=true)
     */
    private $imageIcon;

    /**
     * @var string
     *
     * @ORM\Column(name="imageBanner", type="string", length=250, nullable=true)
     */
    private $imageBanner;

    /**
     * @var bool
     *
     * @ORM\Column(name="isCancelled", type="boolean", nullable=true)
     */
    private $isCancelled;

    /**
     * @var bool
     *
     * @ORM\Column(name="isSoldOut", type="boolean", nullable=true)
     */
    private $isSoldOut;

    /**
     * @var bool
     *
     * @ORM\Column(name="isValid", type="boolean", nullable=true)
     */
    private $isValid;

    /**
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $location;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Concert", mappedBy="festival", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $concert;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Genre", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $genre;

    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return $this->title;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->concert = new \Doctrine\Common\Collections\ArrayCollection();
        $this->start = new \DateTime();
        $this->end = new \DateTime();
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return float
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param float $budget
     */
    public function setBudget($budget)
    {
        $this->budget = $budget;
    }

    /**
     * @return string
     */
    public function getLinkWebsite()
    {
        return $this->linkWebsite;
    }

    /**
     * @param string $linkWebsite
     */
    public function setLinkWebsite($linkWebsite)
    {
        $this->linkWebsite = $linkWebsite;
    }

    /**
     * @return string
     */
    public function getLinkFbEvent()
    {
        return $this->linkFbEvent;
    }

    /**
     * @param string $linkFbEvent
     */
    public function setLinkFbEvent($linkFbEvent)
    {
        $this->linkFbEvent = $linkFbEvent;
    }

    /**
     * @return string
     */
    public function getLinkFbPage()
    {
        return $this->linkFbPage;
    }

    /**
     * @param string $linkFbPage
     */
    public function setLinkFbPage($linkFbPage)
    {
        $this->linkFbPage = $linkFbPage;
    }

    /**
     * @return string
     */
    public function getLinkInstagram()
    {
        return $this->linkInstagram;
    }

    /**
     * @param string $linkInstagram
     */
    public function setLinkInstagram($linkInstagram)
    {
        $this->linkInstagram = $linkInstagram;
    }

    /**
     * @return string
     */
    public function getLinkTickets()
    {
        return $this->linkTickets;
    }

    /**
     * @param string $linkTickets
     */
    public function setLinkTickets($linkTickets)
    {
        $this->linkTickets = $linkTickets;
    }

    /**
     * @return string
     */
    public function getImageIcon()
    {
        return $this->imageIcon;
    }

    /**
     * @param string $imageIcon
     */
    public function setImageIcon($imageIcon)
    {
        $this->imageIcon = $imageIcon;
    }

    /**
     * @return string
     */
    public function getImageBanner()
    {
        return $this->imageBanner;
    }

    /**
     * @param string $imageBanner
     */
    public function setImageBanner($imageBanner)
    {
        $this->imageBanner = $imageBanner;
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

    /**
     * @return bool
     */
    public function isSoldOut()
    {
        return $this->isSoldOut;
    }

    /**
     * @param bool $isSoldOut
     */
    public function setIsSoldOut($isSoldOut)
    {
        $this->isSoldOut = $isSoldOut;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * @param bool $isValid
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;
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
    public function getConcert()
    {
        return $this->concert;
    }

    /**
     * @param mixed $concert
     */
    public function setConcert($concert)
    {
        $this->concert = $concert;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;
    }

}
