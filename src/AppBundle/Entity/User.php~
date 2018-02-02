<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Wishlist", inversedBy="user", cascade={"all"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $wishlist;

    /**
     * @var string
     *
     * @ORM\Column(name="imageIcon", type="string", length=250, nullable=true)
     */
    private $imageIcon;

    /**
     * NBLN-T : ToString
     */
    public function __toString()
    {
        return $this->username;
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
     * Set address.
     *
     * @param \AppBundle\Entity\Location|null $address
     *
     * @return User
     */
    public function setAddress(\AppBundle\Entity\Location $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return \AppBundle\Entity\Location|null
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set wishlist.
     *
     * @param \AppBundle\Entity\Wishlist|null $wishlist
     *
     * @return User
     */
    public function setWishlist(\AppBundle\Entity\Wishlist $wishlist = null)
    {
        $this->wishlist = $wishlist;

        return $this;
    }

    /**
     * Get wishlist.
     *
     * @return \AppBundle\Entity\Wishlist|null
     */
    public function getWishlist()
    {
        return $this->wishlist;
    }

    /**
     * Set imageIcon.
     *
     * @param string|null $imageIcon
     *
     * @return User
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
}
