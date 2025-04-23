<?php

namespace App\Controller;

use App\Repository\ExtensionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{

    #[Route("/", name: "home")]
    public function index (ExtensionRepository $extensionRepository): Response
    {
        // Récupère toutes les extensions
        $extensions = $extensionRepository->findAll();

        return $this->render('index.html.twig', [
            'extensions' => $extensions,
        ]);
    }

}

?>
