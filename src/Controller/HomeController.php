<?php

namespace App\Controller;

use App\Form\FilterType;
use App\Repository\GiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request,GiteRepository $giteRepository): Response
    {
        $formFilter = $this->createForm(FilterType::class);
        $formFilter->handleRequest($request);

        $gites = $giteRepository->findall();

        if ($formFilter->isSubmitted() && $formFilter->isValid()) {
            
        } else {
            $gites = $giteRepository->findall();
        }

        return $this->render('home/index.html.twig', [
            'gites' => $gites,
            'form' => $formFilter->createView(),
        ]);
    }

    
}
