<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant/{nom}", name="restaurant")
     */
    public function index($nom, RestaurantRepository $restaurantRepository): Response
    {
        //variables
        $error = "";

        if(!empty($nom)) {
            $restaurant = $restaurantRepository->findOneBy([
                'nom' => $nom
            ]);
            if(empty($restaurant)) {
                $error = 'Le restaurant que vous essayer de trouver n\'existe pas';
            }
        }

        //render
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurant,
            'error' => $error
        ]);
    }
}
