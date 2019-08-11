<?php

namespace App\Controller;

use App\Entity\Search;
use App\Entity\Type;
use App\Form\SearchType;
use App\Repository\GouvernoratRepository;
use App\Repository\MaisonRepository;
use App\Repository\RegionRepository;
use App\Repository\TypeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, MaisonRepository $maisonRepository)
    {
        $search = new Search();
        $form = $this->createForm(SearchType::class, $search);
        $form->handleRequest($request);
            $search->setGouvernorat($request->query->get('gouvernorat'));
            $search->setRegion($request->query->get('region'));
            $search->setType($request->query->get('type'));
            dump($search);
            if( $search->getGouvernorat() == null){
                $maisons = $maisonRepository->getLastMaisons();
            }else {
                $maisons = $maisonRepository->findMaisons($search);
            }
            dump($maisons);


            return $this->render('home/index.html.twig', [
                'form' => $form->createView(),
                'maisons' => $maisons,
                'controller_name' => 'PubX- ',]);



    }

}
