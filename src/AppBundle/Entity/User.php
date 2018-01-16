<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="username", type="string", length=50)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100)
     */
    private $email;

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
     * Set username.
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
}
