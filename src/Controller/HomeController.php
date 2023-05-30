<?php

namespace App\Controller;

use App\Form\FilterType;
use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(GiteRepository $giteRepository): Response
    {
        $gites = $giteRepository->findAll();
        $formFilter = $this->createForm(FilterType::class);
        $viewFormFilter = $formFilter->createView();

        return $this->render('home/index.html.twig', [
            'gites' => $gites,
            'form' => $viewFormFilter,
        ]);
    }

    
}
