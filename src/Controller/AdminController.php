<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;


class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
     /**
     * @Route("/clinique", name="clinique")
     */
    public function listesclinique()
    {
        $user=$this->getUser();

        $prvs = $this->getDoctrine()->getRepository(PriseDerendezvous::Class)->findAll();

        return $this->render('admin/listeclinique.html.twig',array('prv'=>$prvs,'users'=>$user)); 
    }
    /**
     * @Route("/pharmacie", name="pharmacie")
     */
    public function listespharmacie()
    {
        $prvs = $this->getDoctrine()->getRepository(PriseDerendezvous::Class)->findAll();

        return $this->render('admin/listepharmacie.html.twig',array('prv'=>$prvs)); 
    }
    /**
     * @Route("/rendezvous", name="rendezvous")
     */
    public function listerendezvous()
    {
        
        $prvs = $this->getDoctrine()->getRepository(PriseDerendezvous::Class)->findAll();

        return $this->render('admin/listerv.html.twig',array('prv'=>$prvs)); 
    }
}
