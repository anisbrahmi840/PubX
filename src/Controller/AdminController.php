<?php

namespace App\Controller;

use App\Entity\Gouvernorat;
use App\Form\GouvernoratType;
use App\Repository\GouvernoratRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    /**
     * @Route("/gouvernorat", name="gouvernorat_list")
     */
    public function gouvernorat_list(GouvernoratRepository $repository)
    {
        $gouvernorats = $repository->findAll();


        return $this->render('admin/gouvernorat_list.html.twig', [
            'gouvernorats' => $gouvernorats,
        ]);
    }

    /**
     * @Route("/gouvernorat/new", name="gouvernorat_new")
     */
    public function gouvernorat_new(Request $request, ObjectManager $manager){

        $gouvernorat = new Gouvernorat();
        $form = $this->createForm(GouvernoratType::class, $gouvernorat);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($gouvernorat);
            $manager->flush();
        }
        return $this->render('admin/gouvernorat_new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
