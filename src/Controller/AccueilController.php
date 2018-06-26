<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;
use Symfony\Component\HttpFoundation\Request;

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
public function PrisedeRV(Request $request)
            {
                $em = $this->getDoctrine()->getManager();
            if($request->isMethod('POST')) {
                if($_POST['form']=''){
                    extract($_POST);
                    $priserendezvous = new  PriseDerendezvous();
                    $priserendezvous->setNomComplet($nomcomplet);
                    $priserendezvous->setTelephone($tel);
                    $priserendezvous->setAdresseMail($email);
                    $priserendezvous->setDatenaiss($date);
                    $priserendezvous->setSpecialite($specialite);
                    $priserendezvous->setDaterv(new \DateTime('now'));
                    $priserendezvous->setMotif($motif);

                    $em->persist($priserendezvous);
                    $em->flush();
                    $bien = $this->getDoctrine()->getManager()->getRepository('accueil/index.html')
                    ->FindAll();
                      return $this->render('accueil/index.html.twig', array(
                        '' => $bien

                       ));
                        }
                    }}}