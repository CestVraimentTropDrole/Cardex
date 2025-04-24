<?php

namespace App\Controller;

use App\Entity\Exchange;
use App\Repository\ExchangeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExchangeController extends AbstractController
{

    #[Route("/exchange", name: "exchanges.show")]
    public function show (ExchangeRepository $exchangeRepository): Response
    {
        $exchanges = $exchangeRepository->findAll();

        return $this->render('exchange/exchange.html.twig', [
            'exchanges' => $exchanges,
        ]);
    }

    #[Route("/exchange/{exchange}", name: "exchange.show")]
    public function showExchange (Request $request, ExchangeRepository $exchangeRepository): Response
    {
        $id = $request->attributes->get('exchange');

        $exchange = $exchangeRepository->findOneBy([
            'id' => $id,
        ]);

        return $this->render('exchange/exchange_info.html.twig', [
            'exchange' => $exchange,
        ]);
    }

}

?>
