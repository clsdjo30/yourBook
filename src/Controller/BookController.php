<?php

namespace App\Controller;


use App\Repository\AuthorRepository;
use App\Repository\BookRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class  BookController extends AbstractController
{
    #[Route('/', name: 'app_book')]
    public function index(PaginatorInterface $paginator, BookRepository $repository, AuthorRepository $authorRepository, Request $request): Response
    {

        $books = $paginator->paginate(
            $repository->findAll(),
            $request->query->getInt('page', 1), 6
        );
        $authors = $authorRepository->findAll()
;
        return $this->render('pages/book/index.html.twig', [
            'books' => $books,
            'authors' => $authors
        ]);
    }
}
