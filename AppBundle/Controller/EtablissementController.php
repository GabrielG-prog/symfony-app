<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\EtablissementType;
use AppBundle\Entity\Etablissement;

class EtablissementController extends Controller
{
    /**
     * @Route("/listeEtablissement", name="listeEtablissement")
     */
    public function listeEtablissementAction(Request $request)
    {
       
        $etablisement = $this->getDoctrine()->getRepository('AppBundle:Etablissement')->findAll();
            
        // replace this example code with whatever you need
        return $this->render('GestionEtablissement/ListeEtablissement.html.twig', [
            'ListeEtablissement' => $etablisement,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/ficheEtablissement/{idEtablissement}", name="ficheEtablissement")
     */
    public function ficheEtablissementAction(Request $request, int $idEtablissement)
    {
       
        $etablissement = $this->getDoctrine()->getRepository('AppBundle:Etablissement')->find($idEtablissement);
        
        if (null === $etablissement){
            throw new NotFoundHttpException("Désolé, l'établissement n'a pas été trouvé.");
        }
        // replace this example code with whatever you need
        return $this->render('GestionEtablissement/FicheEtablissement.html.twig', [
            'ficheEtablissement' => $etablissement
        ]);
    }
    /**
     * @Route ("/ficheEtablissement/ajout", name="ajout_etablissement")
     */
    public function ajoutEtablissementAction(Request $request)
    {
        $etablisement = new Etablissement();
        $formEtablissement = $this->createForm(EtablissementType::class, $etablisement);

        $formEtablissement->handleRequest($request);

        if($formEtablissement->isSubmitted() && $formEtablissement->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($etablisement);
            $manager->flush();

            return $this->redirectToRoute('listeEtablissement');
        }

        return $this->render('GestionEtablissement/FormEtablis.html.twig', [
            'formEtablissement' => $formEtablissement->createView(),
        ]);
    }
    /**
     * @Route("/ficheEtablissement/modifier/{idEtablissement}", name="modifEtablissement")
     */
    public function modifEtablissementAction(int $idEtablissement, Request $request)
    {
        $etablissement = $this->getDoctrine()->getRepository('AppBundle:Etablissement')->find($idEtablissement);
        if (null === $etablissement) {
            throw new NotFoundHttpException("Désolé, l'établissement n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(EtablissementType::class, $etablissement, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($etablissement);
            $manager->flush();

            return $this->redirectToRoute('listeEtablissement', [
                'idEtablissement' => $etablissement->getId()
            ]);
        }

        return $this->render('GestionEtablissement/modifEtablissement.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    /**
     * @Route("/ficheEtablissement/suppEtablissement/{idEtablissement}", name="suppEtablissement")
     */
    public function suppEtablissementAction(Request $request, int $idEtablissement)
    {
       
        $etablissement = $this->getDoctrine()->getRepository('AppBundle:Etablissement')->find($idEtablissement);
        
        if (null === $etablissement){
            throw new NotFoundHttpException("Désolé, l'établissement n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($etablissement);
            $manager->flush($etablissement);
        }
        return $this->redirectToRoute('listeEtablissement', [
            'idEtablissement' => $etablissement->getId()
        ]);
    }
    
}