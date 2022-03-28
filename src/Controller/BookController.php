<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class  BookController extends AbstractController
{
    #[Route('/', name: 'app_book')]
    public function index(): Response
    {

        return $this->render('pages/book/index.html.twig');
    }
}
