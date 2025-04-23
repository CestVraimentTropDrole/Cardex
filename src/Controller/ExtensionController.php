<?php

namespace App\Controller;

use App\Repository\ExtensionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExtensionController extends AbstractController
{

    #[Route('/{extension}', name: 'extension.show', requirements: ['extension' => '[a-z0-9-]+'])]
    public function show (Request $request, ExtensionRepository $extensionRepository): Response
    {
        $id = $request->attributes->get('extension');

        $extension = $extensionRepository->findOneBy([
            'id' => $id,
        ]);

        if (!$extension) {
            throw $this->createNotFoundException('Ln\'extension demandée n\'existe pas.');
        }

        return $this->render('extension/extension.html.twig', [
            'extension' => $extension,
        ]);
    }

}

?>
