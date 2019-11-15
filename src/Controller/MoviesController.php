<?php

namespace App\Controller;

use App\Entity\Movies;
use App\Form\MovieType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class MoviesController extends AbstractController
{
    /**
     * @Route("/movies", name="movies")
     */
    public function index(Request $request)
    {
        $id = $request->attributes->get('id');

        $movie = $this->getDoctrine()
                        ->getRepository(Movies::class)
                        ->find($id);

        if (!$movie) {
            throw $this->createNotFoundException(
                'No movie found for id '.$id
            );
        }

        return $this->render('movies/index.html.twig', [
            'mov_title' =>  $movie->getMovTitle(),
            'mov_desc'  =>  $movie->getMovDesc(),
            'mov_year'  =>  $movie->getMovYear(),
        ]);
    }

    public function import(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();

        $movie = new Movies();
        $movie->setMovTitle('Spiderman - Far From Home');
        $movie->setMovId(12);
        $movie->setMovYear(2019);
        $movie->setMovDesc('This is not a movie abour spiders or mans. Its about Spiderman!');

        $entityManager->persist($movie);
        $entityManager->flush();

        $arrData = ['output' => 'Imported movie '.$movie->getMovTitle()];
        return new JsonResponse($arrData);
        //return new Response('Imported movie '.$movie->getMovTitle());
    }

    public function new(Request $request)
    {
        $movie = new Movies();
        $form = $this->createForm(MovieType::class,$movie,[
            'attr' => ['id' => 'new-movie-form'],
            'action' => $this->generateUrl('movies_new'),
            'method' => 'POST']);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $movie = $form->getData();
            $movie->setMovId(15);

            $entityManager = $this->getDoctrine()->getManager();

            // tell Doctrine you want to (eventually) save the Product (no queries yet)
            $entityManager->persist($movie);

            // actually executes the queries (i.e. the INSERT query)
            $entityManager->flush();

            return $this->render('movies/index.html.twig', [
                'mov_title' =>  $movie->getMovTitle(),
                'mov_desc'  =>  $movie->getMovDesc(),
                'mov_year'  =>  $movie->getMovYear(),
            ]);
        }
    
        return $this->render('movies/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
