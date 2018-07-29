<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientformType;
use App\Repository\ClientRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\PriseDerendezvous;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/listepatient", name="listepatient")
     */
    public function listepatient(ClientRepository $clients)
    {
        return $this->render('medecin/listepatient.html.twig', ['clients'=>$clients->findAll()]);
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

    /**
     * @Route("patient/{id}", name="edit_patient")
     */
    public function edit(Request $request, Client $client): Response{
        $form = $this->createForm(ClientformType::class, $client);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('listepatient');
        }

        return $this->render('medecin/edit.html.twig', [
            'client'=>$client,
            'form'=>$form->createView()
        ]);
    }

    /**
     * @Route("/delpatient/{id}", name="delete_patient")
     */
    public function delete(Request $request, Client $client): Response
    {
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        
        return $this->redirectToRoute('listepatient');
    }
//     /**
//      * @Route("/addpatient", name="add_patient", methods="GET|POST")
//      */
//     public function add(Request $request){

//         $client = new Client();
//         $form = $this->createForm(ClientformType::class, $client);
//         $form->handleRequest($request);

//         if($form->isSubmitted() && $form->isValid()){
//             $em = $this->getDoctrine()->getManager();
//             $em->persist($client);
//             $em->flush();

//             return $this->redictToRoute('listepatient');
//         }

//         return $this->render('medecin/addpatient.html.twig', [
//             'client'=>$client,
//             'form'=> $form->createView()
//         ]);
//     }
// }
}