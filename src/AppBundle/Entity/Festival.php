<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Festival
 *
 * @ORM\Table(name="festival")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FestivalRepository")
 * @package                                                               AppBundle\Entity
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
     * One Student has One Student.
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Festival")
     * @ORM\JoinColumn(name="festival_reference",              referencedColumnName="id", nullable=true)
     */
    private $festival;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Wishlist", mappedBy="festival")
     * @ORM\JoinTable(name="wishlist_festival")
     */
    private $wishlist;

    /**
     * @return $this
     */
    public function __clone()
    {
        $this->id = null;
        $this->location = clone $this->getLocation();
        $this->genre = clone $this->getGenre();
        $this->isValid = false;
        return $this;
    }

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
        $this->isCancelled = false;
        $this->isValid = false;
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
     * Set title.
     *
     * @param string $title
     *
     * @return Festival
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description.
     *
     * @param string $description
     *
     * @return Festival
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set start.
     *
     * @param \DateTime|null $start
     *
     * @return Festival
     */
    public function setStart($start = null)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start.
     *
     * @return \DateTime|null
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end.
     *
     * @param \DateTime|null $end
     *
     * @return Festival
     */
    public function setEnd($end = null)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end.
     *
     * @return \DateTime|null
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set budget.
     *
     * @param float|null $budget
     *
     * @return Festival
     */
    public function setBudget($budget = null)
    {
        $this->budget = $budget;

        return $this;
    }

    /**
     * Get budget.
     *
     * @return float|null
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * Set linkWebsite.
     *
     * @param string|null $linkWebsite
     *
     * @return Festival
     */
    public function setLinkWebsite($linkWebsite = null)
    {
        $this->linkWebsite = $linkWebsite;

        return $this;
    }

    /**
     * Get linkWebsite.
     *
     * @return string|null
     */
    public function getLinkWebsite()
    {
        return $this->linkWebsite;
    }

    /**
     * Set linkFbEvent.
     *
     * @param string|null $linkFbEvent
     *
     * @return Festival
     */
    public function setLinkFbEvent($linkFbEvent = null)
    {
        $this->linkFbEvent = $linkFbEvent;

        return $this;
    }

    /**
     * Get linkFbEvent.
     *
     * @return string|null
     */
    public function getLinkFbEvent()
    {
        return $this->linkFbEvent;
    }

    /**
     * Set linkFbPage.
     *
     * @param string|null $linkFbPage
     *
     * @return Festival
     */
    public function setLinkFbPage($linkFbPage = null)
    {
        $this->linkFbPage = $linkFbPage;

        return $this;
    }

    /**
     * Get linkFbPage.
     *
     * @return string|null
     */
    public function getLinkFbPage()
    {
        return $this->linkFbPage;
    }

    /**
     * Set linkInstagram.
     *
     * @param string|null $linkInstagram
     *
     * @return Festival
     */
    public function setLinkInstagram($linkInstagram = null)
    {
        $this->linkInstagram = $linkInstagram;

        return $this;
    }

    /**
     * Get linkInstagram.
     *
     * @return string|null
     */
    public function getLinkInstagram()
    {
        return $this->linkInstagram;
    }

    /**
     * Set linkTickets.
     *
     * @param string|null $linkTickets
     *
     * @return Festival
     */
    public function setLinkTickets($linkTickets = null)
    {
        $this->linkTickets = $linkTickets;

        return $this;
    }

    /**
     * Get linkTickets.
     *
     * @return string|null
     */
    public function getLinkTickets()
    {
        return $this->linkTickets;
    }

    /**
     * Set imageIcon.
     *
     * @param string|null $imageIcon
     *
     * @return Festival
     */
    public function setImageIcon($imageIcon = null)
    {
        $this->imageIcon = $imageIcon;

        return $this;
    }

    /**
     * Get imageIcon.
     *
     * @return string|null
     */
    public function getImageIcon()
    {
        return $this->imageIcon;
    }

    /**
     * Set imageBanner.
     *
     * @param string|null $imageBanner
     *
     * @return Festival
     */
    public function setImageBanner($imageBanner = null)
    {
        $this->imageBanner = $imageBanner;

        return $this;
    }

    /**
     * Get imageBanner.
     *
     * @return string|null
     */
    public function getImageBanner()
    {
        return $this->imageBanner;
    }

    /**
     * Set isCancelled.
     *
     * @param bool|null $isCancelled
     *
     * @return Festival
     */
    public function setIsCancelled($isCancelled = null)
    {
        $this->isCancelled = $isCancelled;

        return $this;
    }

    /**
     * Get isCancelled.
     *
     * @return bool|null
     */
    public function getIsCancelled()
    {
        return $this->isCancelled;
    }

    /**
     * Set isSoldOut.
     *
     * @param bool|null $isSoldOut
     *
     * @return Festival
     */
    public function setIsSoldOut($isSoldOut = null)
    {
        $this->isSoldOut = $isSoldOut;

        return $this;
    }

    /**
     * Get isSoldOut.
     *
     * @return bool|null
     */
    public function getIsSoldOut()
    {
        return $this->isSoldOut;
    }

    /**
     * Set isValid.
     *
     * @param bool|null $isValid
     *
     * @return Festival
     */
    public function setIsValid($isValid = null)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get isValid.
     *
     * @return bool|null
     */
    public function getIsValid()
    {
        return $this->isValid;
    }

    /**
     * Set location.
     *
     * @param \AppBundle\Entity\Location $location
     *
     * @return Festival
     */
    public function setLocation(\AppBundle\Entity\Location $location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location.
     *
     * @return \AppBundle\Entity\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add concert.
     *
     * @param \AppBundle\Entity\Concert $concert
     *
     * @return Festival
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

    /**
     * Set genre.
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Festival
     */
    public function setGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre.
     *
     * @return \AppBundle\Entity\Genre
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set festival.
     *
     * @param \AppBundle\Entity\Festival|null $festival
     *
     * @return Festival
     */
    public function setFestival(\AppBundle\Entity\Festival $festival = null)
    {
        $this->festival = $festival;

        return $this;
    }

    /**
     * Get festival.
     *
     * @return \AppBundle\Entity\Festival|null
     */
    public function getFestival()
    {
        return $this->festival;
    }

    /**
     * Add wishlist.
     *
     * @param \AppBundle\Entity\Wishlist $wishlist
     *
     * @return Festival
     */
    public function addWishlist(\AppBundle\Entity\Wishlist $wishlist)
    {
        $this->wishlist[] = $wishlist;

        return $this;
    }

    /**
     * Remove wishlist.
     *
     * @param \AppBundle\Entity\Wishlist $wishlist
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeWishlist(\AppBundle\Entity\Wishlist $wishlist)
    {
        return $this->wishlist->removeElement($wishlist);
    }

    /**
     * Get wishlist.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWishlist()
    {
        return $this->wishlist;
    }

}
