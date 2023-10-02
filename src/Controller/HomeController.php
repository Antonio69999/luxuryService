<?php

namespace App\Controller;

use App\Entity\Candidat;
use App\Entity\JobOffer;
use App\Form\JobOfferType;
use App\Repository\JobOfferRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(Candidat $candidat, JobOfferRepository $jobOfferRepository, JobOffer $jobOffer): Response
    {

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'candidat' => $candidat->getId(),
            'joboffers' => $jobOfferRepository->findAll(),
        ]);
    }
}
