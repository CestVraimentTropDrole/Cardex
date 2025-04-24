<?php

namespace App\Service;

use App\Repository\CardRepository;

class CardExtensionService
{

    private $cardRepository;

    public function __construct(CardRepository $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }

    public function getMissingCards(int $extensionId): array
    {
        $cards = $this->cardRepository->findMissingCards($extensionId);

        return $cards;
    }

    public function getAllMissingCards(): array
    {
        $cards = $this->cardRepository->findAllMissingCards();

        return $cards;
    }

}

?>
