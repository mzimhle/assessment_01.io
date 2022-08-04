<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// Requests
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    /**
     * Landing page for the website
     * 
     * @param Request $request 
     * @return Response
     *	
     * @Route("/", name="app_home")
     */
    public function index(Request $request): Response
    {
        return $this->render('index.html.twig');
    }
}