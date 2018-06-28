<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;
use App\Entity\Specialite;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\SpecialiteStuctureRepository;
class AccueilController extends Controller
{
    
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
    /**
     * @Route("/accueil", name="accueil")
     */
public function PrisedeRV(Request $request)
            {

               
        $em = $this->getDoctrine()->getManager();
        $specialitet=$em->getRepository(Specialite::class)->findAll();;
            if($request->isMethod('POST')) {
                if(isset($_POST['ajouter'])){
                    extract($_POST);
                $idspec=$em->getRepository(Specialite::class)->findById(array('id'=>$specialite));

                    $priserendezvous = new  PriseDerendezvous();
                    $priserendezvous->setNomComplet($nomcomplet);
                    $priserendezvous->setTelephone($tel);
                    $priserendezvous->setAdresseMail($email);
                    $priserendezvous->setDatenaiss(new \DateTime($date));
                    $priserendezvous->setSpecialite($idspec[0]);
                    $priserendezvous->setDaterv(new \DateTime('now'));
                    $priserendezvous->setMotif($motif);
                    $em->persist($priserendezvous);
                    $em->flush();
                   // $bien = $this->getDoctrine()->getManager()->getRepository('accueil/index.html')
                   // ->FindAll();
                }
            }
                      return $this->render('accueil/index.html.twig',[
                      'specialites'=>$specialitet

                      ]);
                    }
                }