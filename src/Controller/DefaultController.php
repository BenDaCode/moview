<?php

namespace App\Controller;

use App\Entity\Movies;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {   
        
        $movies = $this->getDoctrine()
                        ->getRepository(Movies::class)
                        ->all();

        return $this->render('default/index.html.twig', [
            'movies' => $movies,
        ]);
    }
}
