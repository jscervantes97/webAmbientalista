<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistroController extends AbstractController
{
    /**
     * @Route("/registrarUsuarios", name="registrarUsuarios")
     */
    public function index(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        /*
        $user2 = $this->getUser(); //OBTENGO AL USUARIO ACTUALMENTE LOGUEADO
        if(!$user2){
            return $this->redirectToRoute('login');
        }
        */
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        //esta parte lo que hace es que evalua cuando se recarga la pagina al darle click al boton de registrar
        if($form->isSubmitted() && $form->isValid()){
            $user->setRoles(['ROLE_USER']);
            $user->setPassword($encoder->encodePassword($user,$form['password']->getData()));
            $em->persist($user);
            $em->flush();
            $this->addFlash("exito","Se han registrado los datos del usuario con exito");
            return $this->redirectToRoute('registrarUsuarios');
        }
        //en esta parte se encarga de generar el arreglo que contiene todos los usuarios
        $usuarios = $em->getRepository(User::class)->findAll();
        return $this->render('registro/index.html.twig', [
            'controller_name' => 'RegistroController',
            'form' => $form->createView(),
            'usuarios' => $usuarios
        ]);
    }
}
