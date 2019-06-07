<?php

namespace App\Controller;

use App\Repository\PropertyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @var PropertyRepository $repository
     */
    private $repository;

    /**
     * HomeController constructor.
     * @param PropertyRepository $repository
     */
    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return Response
     */
    public function index(): Response
    {
        $properties = $this->repository->findAllVisilbile();

        return $this->render('pages\home.html.twig',
            [
                'properties' => $properties
            ]);
    }
}