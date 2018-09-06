<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ListController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(): Response
    {
        return $this->render('list/index.html.twig', [
            'controller_list' => 'list',
        ]);
    }
}
