<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wishlist
 *
 * @ORM\Table(name="wishlist")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WishlistRepository")
 */
class Wishlist
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", mappedBy="wishlist")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @var \AppBundle\Entity\Festival $festival
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Festival", inversedBy="wishlist_id")
     * @ORM\JoinTable(name="wishlist_festival")
     */
    private $festival;

    /**
     * @var \AppBundle\Entity\Genre $genre
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Genre", inversedBy="wishlist_id")
     * @ORM\JoinTable(name="wishlist_genre")
     */
    private $genre;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Location", inversedBy="wishlist_id")
     * @ORM\JoinTable(name="wishlist_location")
     */
    private $location;

    /**
     * @var \AppBundle\Entity\Artist $artist
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Artist", inversedBy="wishlist_id")
     * @ORM\JoinTable(name="wishlist_artist")
     */
    private $artist;

    /**
     * @var \AppBundle\Entity\Concert $concert
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Concert", inversedBy="wishlist_id")
     * @ORM\JoinTable(name="wishlist_concert")
     */
    private $concert;

    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return " Wishlist - " . $this->user;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->festival = new \Doctrine\Common\Collections\ArrayCollection();
        $this->genre = new \Doctrine\Common\Collections\ArrayCollection();
        $this->location = new \Doctrine\Common\Collections\ArrayCollection();
        $this->artist = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set user.
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Wishlist
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user.
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add festival.
     *
     * @param \AppBundle\Entity\Festival $festival
     *
     * @return Wishlist
     */
    public function addFestival(\AppBundle\Entity\Festival $festival)
    {
        $this->festival[] = $festival;

        return $this;
    }

    /**
     * Remove festival.
     *
     * @param \AppBundle\Entity\Festival $festival
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeFestival(\AppBundle\Entity\Festival $festival)
    {
        return $this->festival->removeElement($festival);
    }

    /**
     * Get festival.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFestival()
    {
        return $this->festival;
    }

    /**
     * Add genre.
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return Wishlist
     */
    public function addGenre(\AppBundle\Entity\Genre $genre)
    {
        $this->genre[] = $genre;

        return $this;
    }

    /**
     * Remove genre.
     *
     * @param \AppBundle\Entity\Genre $genre
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGenre(\AppBundle\Entity\Genre $genre)
    {
        return $this->genre->removeElement($genre);
    }

    /**
     * Get genre.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Add location.
     *
     * @param \AppBundle\Entity\Location $location
     *
     * @return Wishlist
     */
    public function addLocation(\AppBundle\Entity\Location $location)
    {
        $this->location[] = $location;

        return $this;
    }

    /**
     * Remove location.
     *
     * @param \AppBundle\Entity\Location $location
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeLocation(\AppBundle\Entity\Location $location)
    {
        return $this->location->removeElement($location);
    }

    /**
     * Get location.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Add artist.
     *
     * @param \AppBundle\Entity\Artist $artist
     *
     * @return Wishlist
     */
    public function addArtist(\AppBundle\Entity\Artist $artist)
    {
        $this->artist[] = $artist;

        return $this;
    }

    /**
     * Remove artist.
     *
     * @param \AppBundle\Entity\Artist $artist
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeArtist(\AppBundle\Entity\Artist $artist)
    {
        return $this->artist->removeElement($artist);
    }

    /**
     * Get artist.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArtist()
    {
        return $this->artist;
    }

    /**
     * Add concert.
     *
     * @param \AppBundle\Entity\Concert $concert
     *
     * @return Wishlist
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
