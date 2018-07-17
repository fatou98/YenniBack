<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PriseDerendezvous;
use App\Entity\Client;
use App\Entity\Specialite;

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
            return $this->render('client/vsl.html.twig', [
                'controller_name' => 'ClientController',
            ]);
        }
         /**
         * @Route("/livraison", name="livraison")
         */
        public function livraisonmedoc()
        {
            return $this->render('client/livraison.html.twig', [
                'controller_name' => 'ClientController',
            ]);
        }
    /**
     * @Route("/rv", name="rv")
     */
public function PrisedeRV(Request $request)
{

   
$em = $this->getDoctrine()->getManager();
$specialitet=$em->getRepository(Specialite::class)->findAll();;
if($request->isMethod('POST')) {
    if(isset($_POST['ajouter'])){
        extract($_POST);
    $idspec=$em->getRepository(Client::class)->findById(array('id'=>$client));
        $priserendezvous = new  PriseDerendezvous();
        $priserendezvous->setSpecialite($idspec[0]);
        $priserendezvous->setDaterv(new \DateTime('now'));
        $priserendezvous->setMotif($motif);
        $priserendezvous->setHeure($heure);
        $em->persist($priserendezvous);
        $em->flush();
       // $bien = $this->getDoctrine()->getManager()->getRepository('accueil/index.html')
       // ->FindAll();
    }
}
          return $this->render('client/demanderv.html.twig',[
          'specialites'=>$specialitet

          ]);
        }

}
