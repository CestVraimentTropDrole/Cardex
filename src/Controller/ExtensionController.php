<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExtensionController extends AbstractController
{

    #[Route('/{extension}', name: 'extension.show', requirements: ['extension' => '[a-z0-9-]+'])]
    public function show (Request $request): Response
    {
        $extension = $request->attributes->get('extension');

        return $this->render('extension/extension.html.twig', [
            'extension' => $extension,
        ]);
    }

}

?>
