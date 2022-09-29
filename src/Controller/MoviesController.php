<?php

namespace App\Controller;

use App\Entity\Film;
use App\Form\FilmType;
use App\Repository\FilmRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MoviesController extends AbstractController
{
    #[Route('/movies', name: 'movies_cataloge')]
    public function index(FilmRepository $filmRepository): Response
    {
        $movies = $filmRepository->findBy([], ['name' => 'ASC']);

        
        return $this->render('movies/cataloge.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/creation', name: 'movie_creation')]
    public function form(Request $request, FilmRepository $filmRepository): Response
    {
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $filmRepository->save($film, true);

        return $this->redirectToRoute('movies_cataloge');
      }
        return $this->render('movies/filmform.html.twig', [
            'form' => $form->createView()
        ]);

    }
}
