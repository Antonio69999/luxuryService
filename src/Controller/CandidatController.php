<?php

namespace App\Controller;

// use App\Entity\Candidat;
use App\Form\CandidatType;
use App\Repository\CandidatRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Uuid;

#[Route('/candidat')]
class CandidatController extends AbstractController
{

    #[Route('/profile', name: 'app_candidat_profile', methods: ['GET', 'POST'])]
    public function edit(Request $request, EntityManagerInterface $entityManager): Response
    {   

        $candidat = $this->getUser()->getCandidat();
        // dd($candidat);

        $form = $this->createForm(CandidatType::class, $candidat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //upload profil pic
            if ($form['profil_picture']->getData()) { 
            /** @var UploadedFile $brochureFile */
                $profilePictureFile = $form['profil_picture']->getData();

                $profilPictureName = Uuid::v7();
                $extension = $profilePictureFile->guessExtension();
                if(!$extension) {
                    $extension = 'png';
                }

                $profilPictureName = $profilPictureName.'.'.$extension;
                $profilePictureFile->move('assets/uploads/', $profilePictureFile->getClientOriginalName());

                $candidat->setProfilPicture($profilPictureName);
                $entityManager->persist($candidat);
            }

            if ($form['passport_file']->getData()) { 
                /** @var UploadedFile $brochureFile */
                    $passportFile = $form['passport_file']->getData();
    
                    $passportName = Uuid::v7();
                    $extension = $passportFile->guessExtension();
                    if(!$extension) {
                        $extension = 'png';
                    }
    
                    $passportName = $passportName.'.'.$extension;
                    $passportFile->move('assets/uploads/passport', $passportFile->getClientOriginalName());
    
                    $candidat->setPassportFile($passportName);
                    $entityManager->persist($candidat);
                }

                if ($form['cv']->getData()) { 
                    /** @var UploadedFile $brochureFile */
                        $cvFile = $form['cv']->getData();
        
                        $cvName = Uuid::v7();
                        $extension = $cvFile->guessExtension();
                        if(!$extension) {
                            $extension = 'png';
                        }
        
                        $cvName = $cvName.'.'.$extension;
                        $cvFile->move('assets/uploads/passport', $cvFile->getClientOriginalName());
        
                        $candidat->setCv($cvName);
                        $entityManager->persist($candidat);
                    }

            $entityManager->persist($candidat);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_profile', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/profile.html.twig', [
            'candidat' => $candidat,
            'formProfile' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidat->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidat_profile', [], Response::HTTP_SEE_OTHER);
    }
}
