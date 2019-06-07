<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @var PropertyRepository $repository
     */
    private $repository;
    /**
     * @var ObjectManager $em
     */
    private $em;

    public function __construct(PropertyRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        //   $property = $this->repository->findOneBy(['id' => 1]);
        /*   $property[0]->setSold(true);
           $this->em->flush();*/
        /* $repository=$this->getDoctrine()->getRepository(Property::class);
         dump($repository);
        */
        /*
                 $proprety = new Property();
                $proprety->setAdress('adress')
                    ->setTitle('title')
                    ->setBedrooms(4)
                    ->setCity('ciry')
                    ->setDescription('discreption')
                    ->setFloor(1)
                    ->setHeat(0)
                    ->setPostalCode('434553')
                    ->setPrice(345)
                    ->setRooms(5)
                    ->setSold(3)
                    ->setSurface(2345);
                // you can fetch the EntityManager via $this->getDoctrine()
                $entityManager = $this->getDoctrine()->getManager();
                // tell Doctrine you want to (eventually) save the Product (no queries yet)
                $entityManager->persist($proprety);

                // actually executes the queries (i.e. the INSERT query)
                $entityManager->flush();
         */

        return $this->render('property\index.html.twig');
    }

    /**
     * @param $slug
     * @param $id
     * @return Response
     */
    public function show($slug, $id)
    {
        $prperty = $this->repository->find($id);

        if ($prperty->slug() !== $slug) {
          return  $this->redirectToRoute('property.index');
        }
        return $this->render('property\show.html.twig',
            [
                "property" => $prperty
            ]);
    }
}