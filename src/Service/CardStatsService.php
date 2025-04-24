<?php

namespace App\Service;

use App\Repository\CardRepository;

class CardStatsService
{

    private $cardRepository;

    public function __construct(CardRepository $cardRepository)
    {
        $this->cardRepository = $cardRepository;
    }

    public function getCompletionStat(int $extensionId): int
    {
        $total = $this->cardRepository->countByExtension($extensionId);
        $owned = $this->cardRepository->countPossesedByExtension($extensionId);

        if ($total == 0) {
            return 0;
        }

        return((int)round(($owned * 100) / $total));
    }

    public function getAllExtensionsStat(array $extensions): array
    {
        $stats = [];

        foreach ($extensions as $extension) {
            $extensionId = $extension->getId();
            $stats[$extensionId] = [
                'id' => $extensionId,
                'name' => $extension->getName(),
                'code' => $extension->getCode(),
                'completion' => $this->getCompletionStat($extensionId),
            ];
        }
        return $stats;
    }
}

?>
