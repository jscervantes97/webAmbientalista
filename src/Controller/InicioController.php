<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class InicioController extends AbstractController
{

    /**
     * @Route("/", name="Inicio")
     */
    public function index(Request $request)
    {
        $user2 = $this->getUser(); //OBTENGO AL USUARIO ACTUALMENTE LOGUEADO
        if($user2){
            return $this->render('base.html.twig', [
                'usuario'=>$user2
            ]);
        }
        else {
            return $this->redirectToRoute('app_login');
        }

    }


    /**
     * @Route("/404", name="notFound")
     */
    public function notFound(Request $request)
    {
        return $this->render('404.html.twig', []);
    }
    /**
     * @Route("/otro", name="otra")
     */
    public function otro(Request $request)
    {
        return $this->render('paginaPrueba.html.twig', []);
    }
}