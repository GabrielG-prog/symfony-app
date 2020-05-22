<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Form\PaysType;
use AppBundle\Entity\Pays;

class PaysController extends Controller
{
    /**
     * @Route("/listePays", name="listePays")
     */
    public function listePaysAction(Request $request)
    {
       
        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->findAll();
            
        // replace this example code with whatever you need
        return $this->render('GestionPays/ListePays.html.twig', [
            'ListePays' => $pays,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route ("/listePays/ajout", name="ajout_pays")
     */
    public function ajoutPaysAction(Request $request)
    {
        $pays = new Pays();
        $formPays = $this->createForm(PaysType::class, $pays);

        $formPays->handleRequest($request);

        if($formPays->isSubmitted() && $formPays->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($pays);
            $manager->flush();

            return $this->redirectToRoute('listePays');
        }

        return $this->render('GestionPays/FormPays.html.twig', [
            'formPays' => $formPays->createView(),
        ]);
    }
    /**
     * @Route("/listePays/modifier/{idPays}", name="modifPays")
     */
    public function modifPaysAction(int $idPays, Request $request)
    {
        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->find($idPays);
        if (null === $pays) {
            throw new NotFoundHttpException("Désolé, le pays n'a pas été trouvé.");
        }
        $modifForm = $this->createForm(PaysType::class, $pays, [
            'is_edit' => true
        ]);
        $modifForm->handleRequest($request);

        if($modifForm->isSubmitted() && $modifForm->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($pays);
            $manager->flush();

            return $this->redirectToRoute('listePays', [
                'idPays' => $pays->getId()
            ]);
        }

        return $this->render('GestionPays/modifPays.html.twig', [
            'formModif' => $modifForm->createView(),
        ]);
    }
    /**
     * @Route("/listePays/suppPays/{idPays}", name="suppPays")
     */
    public function suppPaysAction(Request $request, int $idPays)
    {
       
        $pays = $this->getDoctrine()->getRepository('AppBundle:Pays')->find($idPays);
        
        if (null === $pays){
            throw new NotFoundHttpException("Désolé, le pays n'a pas été trouvé.");
        }
        else
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->remove($pays);
            $manager->flush($pays);
        }
        return $this->redirectToRoute('listePays', [
            'idPays' => $pays->getId()
        ]);
    }
    
}