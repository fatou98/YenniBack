<?php
namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\PriseDerendezvous;
use App\Entity\Client;
use App\Entity\Specialite;
use App\Entity\Had;
use App\Entity\Vsl;
use App\Entity\Livraison;
use App\Entity\Structure;
use App\Repository\ClientRepository;
use App\Repository\StructureRepository;

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
        public function hospitalisation(Request $request)
        {
            $em = $this->getDoctrine()->getManager();
            
                    if($request->isMethod('POST')) {
                    if(isset($_POST['Envoyez'])){
                        extract($_POST);
                    $client=$em->getRepository(Client::class)->findById(array('id'=>$client));
    
                        $had = new  Had();
                        $had->setAdresse($adresse);
                        $had->setTel($tel);
                        $had->setMotif($motif);
                        $had->setClient($client[0]);
                        $em->persist($had);
                        $em->flush();
                       
                    }
                }
                          return $this->render('client/had.html.twig',[
                          
    
                          ]);
                        }
         /**
         * @Route("/vsl", name="vsl")
         */
        public function vehiculesanitaire(Request $request,ClientRepository $clientrepo)
        {
          
            $em = $this->getDoctrine()->getManager();
            $client=$clientrepo->findAll();
                    if($request->isMethod('POST')) {
                    if(isset($_POST['ajouter'])){
                        extract($_POST);
                    $client=$em->getRepository(Client::class)->findById(array('id'=>$client));
    
                        $vsl = new  Vsl();
                        $vsl->setNomComplet($nomcomplet);
                        $vsl->setAdresse($adresse);
                        $vsl->setTel($telephone);
                        $vsl->setFichemaladie($fichemaladie);
                        $vsl->setClient($client[0]);
                        $em->persist($vsl);
                        $em->flush();
                       
                    }
                }
                          return $this->render('client/vsl.html.twig',[
                            'clients'=>$client
                                
                          ]);
                        }
         /**
         * @Route("/livraison", name="livraison")
         */
        public function livraisonmedoc(Request $request,ClientRepository $clientrepo)
        {
          
            $em = $this->getDoctrine()->getManager();
            $client=$clientrepo->findAll();
            if($request->isMethod('POST')) {
                    if(isset($_POST['Envoyez'])){
                        extract($_POST);
                    $client=$em->getRepository(Client::class)->findById(array('id'=>$client));
    
                        $livraison = new  Livraison();
                        $livraison->setNomComplet($nomcomplet);
                        $livraison->setAdresse($adresse);
                        $livraison->setTel($tel);
                        $livraison->setOrdonnance($ordonnance);
                        $livraison->setClient($client[0]);
                        $em->persist($livraison);
                        $em->flush();
                       // $bien = $this->getDoctrine()->getManager()->getRepository('accueil/index.html')
                       // ->FindAll();
                    }
                }
                          return $this->render('client/livraison.html.twig',[
                          'clients'=>$client
    
                          ]);
                        }
    /**
     * @Route("/rv", name="rv")
     */
    public function PrisedeRV(Request $request,ClientRepository $clientrepo,StructureRepository $structurerepo)
    {

            
        $em = $this->getDoctrine()->getManager();
        $nosspeci=$em->getRepository(Specialite::class)->findAll();
        $client=$clientrepo->findAll();
        $structures=$structurerepo->findAll();
    if($request->isMethod('POST')) {
        if(isset($_POST['ajouter'])){
            extract($_POST);
        $idspec=$em->getRepository(Specialite::class)->findById(array('id'=>$specialite));
        $idclient=$em->getRepository(Client::class)->findById(array('id'=>3));
        $idstruct=$em->getRepository(Structure::class)->findById(array('id'=>$struc));
            $priserendezvous = new  PriseDerendezvous();
            $priserendezvous->setSpecialite($idspec[0]);
            $priserendezvous->setDaterv(new \DateTime('now'));
            $priserendezvous->setMotif($motif);
            $priserendezvous->setHeure($heure);
            $priserendezvous->setStructure($idstruct[0]);
            $priserendezvous->setClient($idclient[0]);
            $em->persist($priserendezvous);
            $em->flush();
        }
    }
              return $this->render('client/demanderv.html.twig',[
              'specialites'=>$nosspeci,
              'clients'=>$client,
              'structures'=>$structures,
              ]);
            }
        }