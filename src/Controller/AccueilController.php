<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function index()
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
    /**
     * @Route("/apropos", name="propos")
     */
    public function apropos()
    {
        return $this->render('accueil/apropos.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }/**
     * @Route("/contact", name="contact")
     */
    public function contact()
    {
        return $this->render('accueil/contact.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }/**
     * @Route("/partenaires", name="partenaires")
     */
    public function partenaires()
    {
        return $this->render('accueil/partenaires.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
