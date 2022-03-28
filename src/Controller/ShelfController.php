<?php

namespace App\Controller;

use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShelfController extends AbstractController
{
    #[Route('/shelf', name: 'app_shelf')]
    public function index(BookRepository $repository, AuthorRepository $authorRepository, PaginatorInterface $paginator, Request $request): Response
    {

        $books = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 6
        );

        $authors = $authorRepository->findAll();

        return $this->render('pages/shelf/index.html.twig', [
            'books' => $books,
            'authors' => $authors

        ]);
    }

}
