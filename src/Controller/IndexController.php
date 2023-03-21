<?php

namespace App\Controller;

use App\Entity\Houses;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class IndexController extends AbstractController
{
    private $entityManager;
    private $serializer;
    public function __construct(EntityManagerInterface $entityManager, SerializerInterface $serializer)
    {
        $this->entityManager = $entityManager;
        $this->serializer = $serializer;
    }


    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('index/index.html.twig');
    }

    #[Route('/house/{houses}', name: 'app_houses')]
    public function houses($houses): Response
    {
        $house = $this->entityManager->getRepository(Houses::class)->findOneBy(['housename' => $houses]);

        return $this->render('index/houses.html.twig', [
            'house'     => $house,
        ]);
    }
}
