<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use AppBundle\Entity\Eleve;
use AppBundle\Entity\Etablisement;
use AppBundle\Entity\Pays;
use AppBundle\Form\PaysType;
use AppBundle\Form\EtablissementType;
use AppBundle\Form\EleveType;

use Appbundle\Service\FormulaireManager;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\Extension\Core\Type\FormType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\Etablissement;

class DefaultController extends Controller
{
    /**
     *@return \Symfony\Component\HttpFoundation\Response
     * @Route("/", name="home")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function indexAction(Request $request)
    {
         if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
        {
            return $this->render('admin.html.twig');
        }
        
         if($this->get('security.authorization_checker')->isGranted('ROLE_USER'))
        {
            return $this->render('utilisateur.html.twig');
        }
        
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="admin")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function adminAction()
    {
        return $this->render('admin.html.twig');
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/utilisateur/", name="utilisateur")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function utilisateurAction()
    {
        return $this->render('utilisateur.html.twig');
    }
    
     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/form", name="form")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function addAction(Request $request)

    {

        $eleve = new Eleve();
        
        $formEleve = $this->createForm('AppBundle\Form\EleveType', $eleve);
        
        $formEleve->handleRequest($request);

        if ($formEleve->isSubmitted() && $formEleve->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($eleve);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'eleve bien enregistré.');
        
        return $this->render('FormEleve.html.twig', [
            'formEleve' => $formEleve->createView()
            ]);

    }
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/formPays", name="formPays")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    
    public function formPaysAction(Request $request)
    {
        $pays = new Pays();
        
        $formPays = $this->createForm('AppBundle\Form\PaysType', $pays);
        
        $formPays->handleRequest($request);

        if ($formPays->isSubmitted() && $formPays->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($pays);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'Pays bien enregistré.');
        
        return $this->render('FormPays.html.twig', [
            'formPays' => $formPays->createView()
            ]);
    }
    
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/formChoix", name="formChoix")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    
    public function formChoixAction(Request $request)
    {
        $choix = new Choix();
        
        $formChoix = $this->createForm('AppBundle\Form\ChoixType', $choix);
        
        $formChoix->handleRequest($request);
        
        if($formChoix->isSubmitted() && $formChoix->isValid())
        {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($choix);
            $manager->flush();
        }
        $request->getSession()->getFlashBag()->add('notice', 'Choix bien enregistré.');
        
        return $this->render('FormSection.html.twig', [
            'formChoix' => $formChoix->createView()
            ]);
    }
    
    /**
     * @Route("/listeEleve", name="listeEleve")
     */
    public function listeEleveAction(Request $request)
    {
       
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->findAll();
            
        // replace this example code with whatever you need
        return $this->render('ListeEleve.html.twig', [
            'listeEleve' => $eleve,
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    
    /**
     * @Route("/ficheEleve", name="ficheEleve")
     */
    public function ficheEleveAction(Request $request, int $id)
    {
       
        $eleve = $this->getDoctrine()->getRepository('AppBundle:Eleve')->find($id);
        
        if (null === $eleve){
            throw new NotFoundHttpException("Désolé, l'élève n'a pas été trouvé.");
        }
        // replace this example code with whatever you need
        return $this->render('FicheEleve.html.twig', [
            'ficheEleve' => $eleve
        ]);
    }
}
