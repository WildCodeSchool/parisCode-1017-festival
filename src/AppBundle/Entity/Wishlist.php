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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Festival")
     * @ORM\JoinColumn(nullable=true)
     */
    private $festival;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Genre")
     * @ORM\JoinColumn(nullable=true)
     */
    private $genre;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Location")
     * @ORM\JoinColumn(nullable=true)
     */
    private $location;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Artist")
     * @ORM\JoinColumn(nullable=true)
     */
    private $artist;

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
}
