<?php

namespace App\Controller;

use App\Repository\ExtensionRepository;
use App\Service\CardStatsService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{

    #[Route("/", name: "home")]
    public function index (ExtensionRepository $extensionRepository, CardStatsService $cardStatsService): Response
    {
        // Récupère toutes les extensions
        $extensions = $extensionRepository->findAll();

        $extensionsStats = $cardStatsService->getAllExtensionsStat($extensions);

        return $this->render('index.html.twig', [
            'stats' => $extensionsStats,
        ]);
    }

}

?>
