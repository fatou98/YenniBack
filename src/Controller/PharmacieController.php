<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PharmacieController extends Controller
{
    /**
     * @Route("/pharmacie", name="pharmacie")
     */
    public function index()
    {
        return $this->render('pharmacie/index.html.twig', [
            'controller_name' => 'PharmacieController',
        ]);
    }
}
