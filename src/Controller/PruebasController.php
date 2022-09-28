<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PruebasController extends AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    //Tenemos que definir como es el endpoint para poder hacer la petición desde el cliente
    //ENDPOINT
    /**
     * @Route("/get/usuarios", name="get_users")
     */
    public function getAllUser(Request $request){
        //Llamará a base de datos y se traerá toda la lista de users
        //Devolver una respuesta en formato Json
        //Request -Petición
        //Response -Hay que devolver una respuesta
        //$response = new Response();
        //$response->setContent('<div>Hola mundo</div>');
        //Capturamos los datos que vienen en el Request
        $id = $request->get('id');
        $this->logger->alert('mensaje');
        //Query sql para traer el user con id=$id
        $response = new JsonResponse();
        $response->setData([
            'success'=>true,
            'data'=>[
                'id'=> intval($id),
                'nombre'=>'pepe',
                'email'=>'pepe@email.com'

            ]
        ]);
        return $response;
    }

}