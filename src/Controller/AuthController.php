<?php

// src/Controller/AuthController.php
namespace App\Controller;

use App\Entity\Users;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Services\AuthServices;

class AuthController extends Controller
{
    /**
     * Function to return the homepage
     * @Route("/", name="homepage")
     * @return Response
     */
    public function index(Request $request)
    {
        return $this->render('auth/registration.html.twig');
    }

    /**
     * Function to create a new user
     * @Route("/create_user", name="create_user", methods="POST")
     */
    public function createUser(AuthServices $authServices, Request $request)
    {
        $check = $authServices->addNewUser($request->request->all());

        if ($check['status']) {
            $this->addFlash('message', $check['message']);
            return $this->redirectToRoute('homepage');
        }

        // Redirect to index page with flash message
        $this->addFlash('message', $check['message']);
        return $this->redirectToRoute('homepage');
    }

    /**
     *
     * @Route("get_all_user", methods="GET")
     */
    public function getAllUser(Request $request)
    {
        $users = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findAll();

        return $this->render('auth/list.html.twig', ['users' => $users]);
    }
}