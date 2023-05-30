<?php

namespace App\Controller;

use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GiteController extends AbstractController
{
    #[Route('/gite/{id}', name: 'gite')]
    public function index($id, GiteRepository $giteRepository): Response
    {
        $gite = $giteRepository->find($id);

        if (!$gite) {
            throw $this->createNotFoundException('Gite not found');
        }

        return $this->render('gite/index.html.twig', [
            'gite' => $gite,
        ]);
    }
}
