<?php

namespace App\Controller;

use App\Repository\VilleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VilleController extends AbstractController
{
    /**
     * @Route("/ville/{nom}", name="ville")
     */
    public function ville($nom, VilleRepository $villeRepository): Response
    {
        //variables
        $error = "";

        if(!empty($nom)) {
            $ville = $villeRepository->findOneBy([
                'nom' => $nom
            ]);
            if(empty($ville)) {
                $error = 'La ville que vous essayer de trouver n\'existe pas';
            }
        }

        //render
        return $this->render('ville/index.html.twig', [
            'ville' => $ville,
            'error' => $error
        ]);
    }
}
