<?php

namespace App\Controller;

use App\Entity\Anfrage;
use App\Entity\Housepictures;
use App\Entity\Houses;
use App\Form\AnfrageType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class IndexController extends AbstractController
{
    private $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }

    #[Route('/house/{houses}', name: 'app_houses')]
    public function houses(Request $request, $houses): Response
    {
        $house = $this->entityManager->getRepository(Houses::class)->findOneBy(['housename' => $houses]);

        $anfrage = new Anfrage();

        $anfrageForm = $this->createForm(AnfrageType::class, $anfrage);

        $anfrageForm->handleRequest($request);

        if($anfrageForm->isSubmitted() && $anfrageForm->isValid()) {
            $data = $anfrageForm->getData();

            $anfrage->setHouse($house);
            $anfrage->setTage(2);
            $anfrage->setValuta(new \Datetime('now'));
            $anfrage->setBestaetigung(1);


            $this->entityManager->persist($anfrage);
            $this->entityManager->flush();

            return $this->redirectToRoute('app_booking', ['request' => $anfrage->getId()]);

        }

        $housePictures = $this->entityManager->getRepository(Housepictures::class)->findBy(['house' => $house]);

        return $this->render('index/houses.html.twig', [
            'house'     => $house,
            'anfrageform' => $anfrageForm->createView(),
            'housepictures' => $housePictures,
        ]);
    }

    #[Route('/booking/{request}', name: 'app_booking')]
    public function sendbookingrequest($request) {

        $booking = $this->entityManager->getRepository(Anfrage::class)->findOneBy(['id' => $request]);

        dd($booking);

        $email = (new TemplatedEmail())
            ->from(new Address('info@zimmer-celle.de', 'Zimmer-Celle.de'))
            ->to($oraclePersonen->getEmail())
            ->subject(sprintf('Hallo %s %s, Ihre Buchungsanfrage',$oraclePersonen->getVorname(), $oraclePersonen->getNachname()))
            //->text(sprintf('Hallo %s %s','Peter', 'Schmidt'))
            ->htmlTemplate('email/email_request.html.twig')
            ->context(array(
                'anfrage' => $booking,
            ));

        $mailer->send($email);

        return $this->redirectToRoute('app_houses', ['houses' => $request]);

    }
}
