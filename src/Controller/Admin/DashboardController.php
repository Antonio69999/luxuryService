<?php

namespace App\Controller\Admin;

use App\Entity\JobOffer;
use App\Entity\Client;
use App\Entity\Candidat;
use App\Repository\CandidatRepository;
use App\Repository\CandidatureRepository;
use App\Repository\ClientRepository;
use App\Repository\JobOfferRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{

    private $candidatRepository;
    private $user;

    public function __construct(CandidatRepository $candidatRepository, ClientRepository $clientRepository, JobOfferRepository $JobOfferRepository, CandidatureRepository $CandidatureRepository)
    {
        $this->candidatRepository = $candidatRepository;
        $this->clientRepository = $clientRepository;
        $this->JobOfferRepository = $JobOfferRepository;
        $this->CandidatureRepository = $CandidatureRepository;

    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $candidatCount = $this->candidatRepository->countCandidat();
        $clientCount = $this->clientRepository->countClients();
        $countJobOffers = $this->JobOfferRepository->countJobOffers();
        $countCandidatures = $this->CandidatureRepository->countCandidatures();

        // dd($candidatCount);
        return $this->render('admin/dashboard.html.twig', [
            'candidatCount' => $candidatCount,
            'clientCount' => $clientCount,
            'countJobOffers' => $countJobOffers,
            'countCandidatures' => $countCandidatures
        ]);
    }

    public function configureDashboard(): Dashboard
    {

        return Dashboard::new()
            ->setTitle('LuxuryService')
            ->setTranslationDomain('admin');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('JobOffer', 'fa-solid fa-briefcase', JobOffer::class);
        yield MenuItem::linkToCrud('Client', 'fa-solid fa-handshake', Client::class);
        yield MenuItem::linkToCrud('Candidat', 'fa-solid fa-pen-nib', Candidat::class);
    }
}
