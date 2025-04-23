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
    public function show(Request $request, CardRepository $cardRepository): Response
    {
        $extension = $request->attributes->get('extension');    // Récupère les infos de la carte dans l'url
        $number = $request->attributes->get('number');

        $card = $cardRepository->findOneBy([    // Trouve la carte correspondante avec son extension et son numéro
            'number' => $number,
            'extension' => $extension,
        ]);

        if (!$card) {   // S'il n'y a aucune carte qui existe dans la db
            throw $this->createNotFoundException('La carte demandée n\'existe pas.');
        }

        $quantity = $this->quantity($card->getQuantity());  // Récupère la quantité de la carte pour recevoir un message formatté

        return $this->render('card/card.html.twig', [
            'card' => $card,
            'quantity' => $quantity,
        ]);
    }
    
    private function quantity(int $quantity) // Renvoie un message formaté en fonction de la quantité possédée de la carte
    {
        if ($quantity == 0) {
            return "Carte non obtenue";
        } else if ($quantity >= 1) {
            return "Nombre de carte : " . $quantity;
        } else {
            throw $this->createNotFoundException('La valeur entrée n\'est pas valide.');
        }
    }

}

?>
