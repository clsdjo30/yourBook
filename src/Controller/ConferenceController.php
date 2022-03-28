<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\ConferenceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConferenceController extends AbstractController
{
    #[Route('/conference', name: 'app_conference')]
    public function index(ConferenceRepository $repository, CommentRepository $commentRepository, Request $request): Response
    {
        $confs = $repository->findAll();
        $comms = $commentRepository->findAll();
        return $this->render('conference/index.html.twig', [
            'confs' => $confs,
            'comms' => $comms
        ]);
    }
}
