<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeScreenController extends AbstractController
{
    /**
     * @Route ("/home", methods={"GET","POST"})
     */
    public function home()
    {
        // return new Response("<h1>Hello World </h1 >");
        return $this->json(['message' => 'hello world']);
    }
}