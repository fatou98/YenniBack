<?php

namespace App\Controller;

use App\Form\UserType;
use App\Form\ClientformType;
use App\Entity\User;
use App\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\ClientPasswordEncoderInterface;

use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller {

   /**
     * @Route("/register/{etat}")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder,$etat) {
        // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        
        if ($etat==1){
           
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //on active par défaut
            $user->setIsActive(true);
           
            $user->addRole("ROLE_MEDECIN");
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->redirectToRoute('medecin');
            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }
<<<<<<< HEAD
        }
        else if ($etat==2){
     
=======
        return $this->render('security/inscription.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Inscription']);
    }
     
 /**
     * @Route("/inscriptionclient",name="inscription")
     */
    public function clientinscriptionAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        // 1) build the form
        $client = new Client();
        $form = $this->createForm(ClientformType::class, $client);
>>>>>>> 678aecd25949d3c59b24618763165032199e60af
        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // 3) Encode the password (you could also do this via Doctrine listener)
<<<<<<< HEAD
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            //on active par défaut
            $user->setIsActive(true);
           
            $user->addRole("ROLE_PATIENT");
=======
           // 3) Encode the password (you could also do this via Doctrine listener)
           $password = $passwordEncoder->encodePassword($client, $client->getPlainPassword());
           $client->setPassword($password);

            //on active par défaut
            //$user->setIsActive(true);
            $user->addRole("ROLE_USER");
>>>>>>> 678aecd25949d3c59b24618763165032199e60af
            // 4) save the User!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->redirectToRoute('patient');

            $this->addFlash('success', 'Votre compte à bien été enregistré.');
            //return $this->redirectToRoute('login');
        }
        }
        
        else if ($etat==3){
     
            // 2) handle the submit (will only happen on POST)
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                // 3) Encode the password (you could also do this via Doctrine listener)
                $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
                $user->setPassword($password);
                //on active par défaut
                $user->setIsActive(true);
               
                $user->addRole("PHARMACIEN");
                // 4) save the User!
                $this->redirectToRoute('pharmacie');

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                // ... do any other work - like sending them an email, etc
                // maybe set a "flash" success message for the user
                $this->addFlash('success', 'Votre compte à bien été enregistré.');
                //return $this->redirectToRoute('login');
            }
            }
        return $this->render('security/inscription.html.twig', ['form' => $form->createView(), 'mainNavRegistration' => true, 'title' => 'Inscription']);

}
     /**
<<<<<<< HEAD
     * @Route("/connexion", name="connexion")
=======
     * @Route("/connexionclient", name="connexionclient")
>>>>>>> 678aecd25949d3c59b24618763165032199e60af
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils) {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        //
        $form = $this->get('form.factory')
                ->createNamedBuilder(null)
                ->add('_username', null, ['label' => 'Email'])
                ->add('_password', \Symfony\Component\Form\Extension\Core\Type\PasswordType::class, ['label' => 'Mot de passe'])
                ->add('ok', \Symfony\Component\Form\Extension\Core\Type\SubmitType::class, ['label' => 'Ok', 'attr' => ['class' => 'btn-success btn-block']])
                ->getForm();
       //return $this->redirectToRoute('membre');

        return $this->render('security/connexion.html.twig', [
                    'mainNavLogin' => true, 'title' => 'Connexion',
                    //
                    'form' => $form->createView(),
                    'last_username' => $lastUsername,
                    'error' => $error,
        ]);
    }




}