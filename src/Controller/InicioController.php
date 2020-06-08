<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class InicioController extends AbstractController
{
    /**
     * @Route("/", name="Inicio")
     */
    public function index(Request $request)
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/404", name="notFound")
     */
    public function notFound(Request $request)
    {
        return $this->render('404.html.twig', []);
    }
}