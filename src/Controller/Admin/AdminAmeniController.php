<?php


namespace App\Controller\Admin;


use App\Entity\Ameni;
use App\Entity\Property;
use App\Form\AmeniType;
use App\Form\PropertyType;
use App\Repository\AmeniRepository;
use App\Repository\PropertyRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminAmeniController extends AbstractController
{
    /**
     * @var PropertyRepository
     */
    private $repository;
    /**
     * @var ObjectManager $em
     */
    private $em;

    public function __construct(AmeniRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;

    }

    public function index()
    {
        $amenis = $this->repository->findAll();
        return $this->render('admin/ameni/index.html.twig',
            [
                'amenis' => $amenis
            ]);
    }

    public function edit(Ameni $ameni, Request $request)
    {
        $form = $this->createForm(AmeniType::class, $ameni);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            $this->addFlash('success',"bien edité");

            return $this->redirectToRoute('admin.ameni.index');
        }
        return $this->render('admin/ameni/edit.html.twig',
            [
                'ameni' => $ameni,
                'form' => $form->createView()
            ]);
    }

    public function new(Request $request)
    {
        $ameni = new Ameni();
        $form = $this->createForm(AmeniType::class, $ameni);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($ameni);
            $this->em->flush();
            $this->addFlash('success',"bien créé");
            return $this->redirectToRoute('admin.ameni.index');
        }
        return $this->render('admin/ameni/new.html.twig',
            [
                'ameni' => $ameni,
                'form' => $form->createView()
            ]);

    }
    public function delete(Ameni $ameni,Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $ameni->getId(),$request->get('_token'))){
            $this->em->remove($ameni);
            $this->em->flush();
            $this->addFlash('success',"bien supprimé");

        }
        return $this->redirectToRoute('admin.ameni.index');


    }

}