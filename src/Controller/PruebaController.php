<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class PruebaController extends AbstractController
{
    // private $loop = \React\E
    private $pila = array("Chuy","Jose","Eroham");

    /**
     * @Route("api/pila", name="ObtenerTodosAlv", methods={"GET"})
     */
    public function obtenerTodo(){
        return new JsonResponse([
            'ElementosActuales'=>$this->pila
        ]);

    }

    /**
     * @Route("api/pila/{id}", name="BuscarUnoAlvPorPOSICION", methods={"GET"})
     */
    public function buscarPorPosicion($id){
        if($id > sizeof($this->pila)){
            return new JsonResponse([
                'Error'=>'Posicion mayor al del arreglo'
            ]);

        }
        return new JsonResponse([
            'encontrado'=>$this->pila[$id]
        ]);

    }

    /**
     * @Route("api/agregar/{elemento}", name="RegistrarElementoRest", methods={"POST"})
     */
    public function agregarElemento(Request $request,$elemento){
        array_push($this->pila,$elemento);
        return new JsonResponse([
            'ElementosActuales'=>$this->pila
        ]);
        //si inserta el elemento pero no persiste xD
    }

    /**
     * @Route("/pruebaPut/{id}", name="Prueba Put", methods={"PUT"})
     */
    public function rutaPut(Request $request,$id)
    {
        return new JsonResponse([
            'averAlCine'=>'Puto'
        ]);
    }
    /**
     * @Route("/pruebaDelete/{id}", name="Prueba Delete", methods={"DELETE"})
     */
    public function rutaDelete(Request $request,$id)
    {
        return new JsonResponse([
            'Delete alv'=>'Se le ah dado delete a algo alv'
        ]);
    }


}