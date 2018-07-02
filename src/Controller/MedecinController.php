<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MedecinController extends Controller
{
    /**
     * @Route("/medecin", name="medecin")
     */
    public function index()
    {
        return $this->render('medecin/index.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
        /**
     * @Route("/patient", name="patient")
     */
    public function patient()
    {
        return $this->render('medecin/patient.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
}