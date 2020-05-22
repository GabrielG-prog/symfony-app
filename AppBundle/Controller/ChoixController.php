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
use AppBundle\Entity\Choix;
use AppBundle\Form\ChoixType;
use AppBundle\Form\EtablissementType;
use AppBundle\Form\EleveType;
use Appbundle\Service\FormulaireManager;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;

class ChoixController extends Controller
{
   /**

    * @Route("/", name="home")

    */
    public function indexAction(Request $request)
    {
        
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) 
        {

          if($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN'))
            {
                return $this->render('admin.html.twig');
            }
        
         if($this->get('security.authorization_checker')->isGranted('ROLE_USER'))
            {
                return $this->render('user.html.twig');
            }
        }

        else
        {
            return $this->render('home.html.twig');
        }

    }

/**********************************************************************************************************************************************************/
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/ajouter_choix", name="ajouter_choix")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function formChoixAction(Request $request)
    {
        $choix = new Choix();

        $form = $this->createForm(ChoixType::class, $choix);
    
    
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
    
          $em = $this->getDoctrine()->getManager();
    
          $em->persist($choix);
    
          $em->flush();
    
    
          $request->getSession()->getFlashBag()->add('notice', 'LES CHOIX DE DESTINATION A BIEN ETE ENREGISTRE !!!');
    
        }
    
    
        return $this->render('formChoix.html.twig', array(
    
          'formChoix' => $form->createView(),
    
        ));
    }

     /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/liste_choix", name="liste_choix")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     */
    public function listChoixAction()
    {
       $repository = $this->getDoctrine()->getRepository('AppBundle:Choix');

       $choixs = $repository->findAll();

       return $this->render('vueChoix.html.twig', array(
    
        'choixs' => $choixs));
    }


      /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/modifier_choix/{id}", name="modifier_choix")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     */
    public function editChoixAction(Request $request, Choix $choix)
    {
      $form = $this->createForm(ChoixType::class, $choix);
    
    
      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) 
      {
  
        $em = $this->getDoctrine()->getManager();
  
        $em->flush();
  
  
        $request->getSession()->getFlashBag()->add('notice', 'UN CHOIX A BIEN ETE MODIFIE !!!');
  
      }
  
  
      return $this->render('formEleve.html.twig', array(
  
        'formEleve' => $form->createView(),
  
      ));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/supprimer_choix/{id}", name="supprimer_choix")
     * @Security("is_granted('IS_AUTHENTICATED_FULLY')")
     *
     */
    public function deleteChoixAction(Choix $choix)
    {
      $em = $this->getDoctrine()->getManager();

      $em->remove($choix);

      $em->flush();

      return new Response('CHOIX SUPPRIMER !!!');
    }


}
