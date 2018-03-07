<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    // add your own fields
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $password;

    // Define the properties of the entity

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($firstName)
    {
        return $this->first_name = $firstName;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function setLastName($lastName)
    {
        return $this->last_name = $lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($newEmail)
    {
        return $this->email = $newEmail;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($newPassword)
    {
        return $this->password = $newPassword;
    }
}
