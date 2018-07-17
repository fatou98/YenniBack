<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;


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
       /**
     * @Route("/heure", name="heure")
     */
    public function horairesmedecin()
    {
        return $this->render('medecin/ajouterheuredispo.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
     
       /**
     * @Route("/liste", name="liste")
     */
    public function listepatient()
    {
        return $this->render('medecin/listepatient.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
        /**
     * @Route("/listerv", name="liste")
     */
    public function listerv()
    {
        return $this->render('medecin/listervmedcin.html.twig', [
            'controller_name' => 'MedecinController',
        ]);
    }
}
