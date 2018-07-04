<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;


class MedecinController extends Controller
{
    /**
     * @Route("/medecin", name="medecin")
     */
    public function index()
    {
        $prvs = $this->getDoctrine()->getRepository(PriseDerendezvous::Class)->findAll();

        return $this->render('medecin/index.html.twig',array('prv'=>$prvs)); 
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
