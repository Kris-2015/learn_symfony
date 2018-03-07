<?php

namespace App\Services;

use Doctrine\ORM\EntityManager;
use Psr\Log\LoggerInterface;
use App\Entity\Users;
use Exception;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AuthServices
{
    private $logger;
    private $em;
    private $encoder;

    /**
     * AuthServices constructor.
     * @param LoggerInterface $logger
     * @param EntityManager $entityManager
     */
    public function __construct(LoggerInterface $logger, EntityManager
    $entityManager)
    {
        $this->logger = $logger;
        $this->em = $entityManager;
    }

    /**
     * @param $userData
     * @return array
     */
    public function addNewUser($userData)
    {
        try {
            $user = new Users();
            $user->setFirstName($userData['first_name']);
            $user->setLastName($userData['last_name']);
            $user->setEmail($userData['email']);
            $user->setPassword($userData['password']);

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $this->em->persist($user);

            // actually executes the queries (i.e. the INSERT query)
            $this->em->flush();

            return array('status' => 1, 'message' => 'Inserted data successfully');
        } catch (Exception $e) {
            $this->logger->error('Error occurred while insertion in users table: ' . $e );

            return array('status' => 0, 'message' => 'Error Occurred!');
        }
    }
}