<?php

namespace App\Controller;

use App\Entity\Card;
use App\Repository\CardRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CardController extends AbstractController
{

    #[Route('/{extension}-{number}', name: 'card.show', requirements: ['extension' => '[a-z0-9-]+', 'number' => '\d+'])]
    public function show (Request $request, CardRepository $cardRepository): Response
    {
        $extension = $request->attributes->get('extension');
        $number = $request->attributes->get('number');

        $card = $cardRepository->findOneBy([
            'number' => $number,
        ]);

        if (!$card) {
            throw $this->createNotFoundException('La carte demandée n\'existe pas.');
        }

        return $this->render('card/card.html.twig', [
            'card' => $card,
        ]);
    }

}

?>
