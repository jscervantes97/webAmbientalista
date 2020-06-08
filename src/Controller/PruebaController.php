<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PruebaController extends AbstractController
{

    /**
     * @Route("/verAlCine/{id}", name="RegistrarPosts")
     */
    public function verAlCinePuto(Request $request,$id){
        return new JsonResponse([
            'averAlCine'=>'Puto',
            'idDelPuto'=>$id
        ]);
    }
}