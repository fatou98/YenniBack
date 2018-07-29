<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ClientController extends Controller
{
    /**
     * @Route("/client", name="client")
     */
    public function index()
    {
        return $this->render('client/index.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
    
        /**
         * @Route("/clientaccueil", name="clientaccueil")
         */
        public function accueil()
        {
            return $this->render('client/accueil.html.twig', [
                'controller_name' => 'ClientController',
            ]);
        }
         /**
         * @Route("/had", name="had")
         */
        public function hospitalisation()
        {
            return $this->render('client/had.html.twig', [
                'controller_name' => 'ClientController',
            ]);
        }
         /**
         * @Route("/vsl", name="vsl")
         */
        public function vehiculesanitaire()
        {
            return $this->render('client/vsl.html.twig'
            );
        }
         /**
         * @Route("/livraison", name="livraison")
         */
        public function livraisonmedoc()
        {
            return $this->render('client/livraison.html.twig'
            );
        }
    /**
     * @Route("/rv", name="rv")
     */
    public function demanderv()
    {
        return $this->render('client/demanderv.html.twig', [
            'controller_name' => 'ClientController',
        ]);
    }
}
