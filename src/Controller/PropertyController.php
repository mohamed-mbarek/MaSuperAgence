<?php

namespace App\Controller;
use App\Entity\Property;   
use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{   
    /**
     * @var PropertyRepository
     */
    private $repository;


    public function __construct(PropertyRepository  $repository){
        $this->repository=$repository;
    }

    /**
     * @Route("/biens", name="proprety.index")
     * @return Response
     */
    public function index(): Response
    {
             return $this->render('property/index.html.twig', [
            'current_menu' => 'properties'
        ]);
    }
    /**
     * @Route("/biens/{slug}-{id}", name="proprety.show" ,requirements={"slug": "[a-z0-9\- ]*"})
     *@return Response
     */
    public function show($slug ,$id):Response{
        $property=$this->repository->find($id);
            return $this->render('property/show.html.twig',[
                'property'=>$property,
                'current_menu'=>'properties'
            ]);
    }
    
}
