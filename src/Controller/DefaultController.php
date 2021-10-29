<?php

namespace App\Controller;

use App\Repository\ProprietaireRepository;
use App\Repository\RestaurantRepository;
use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(VilleRepository $villeRepository): Response
    {
        //variables
        $villes = $villeRepository->findAll();

        //render
        return $this->render('default/home.html.twig', [
            'villes' => $villes
        ]);
    }
}
