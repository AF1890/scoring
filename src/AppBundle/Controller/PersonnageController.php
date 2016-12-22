<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Personnage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Personnage controller.
 *
 */
class PersonnageController extends Controller
{
    /**
     * Lists all personnage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnages = $em->getRepository('AppBundle:Personnage')->findAll();

        return $this->render('@App/personnage/index.html.twig', array(
            'personnages' => $personnages,
        ));
    }

    /**
     * Creates a new personnage entity.
     *
     */
    public function newAction(Request $request)
    {
        $personnage = new Personnage();

        $XP = $personnage->setXP(rand(0,400));
        $force = $personnage->setForces((rand(0,200)));
        $PA = $personnage->setPuissanceArme(rand(100,400));
        $PV = $personnage->setPV(500);





//        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($personnage);
            $em->flush($personnage);

            return $this->redirectToRoute('personnage_show', array('id' => $personnage->getId()));


//        return $this->render('@App/personnage/new.html.twig', array(
//            'personnage' => $personnage,
//            'xp' => $XP,
//            'force' => $force,
//            'PA' => $PA,
//            'PV' => $PV,
//            'form' => $form->createView(),
//        ));
    }

    /**
     * Finds and displays a personnage entity.
     *
     */
    public function showAction(Personnage $personnage)
    {
        $deleteForm = $this->createDeleteForm($personnage);

        return $this->render('@App/personnage/show.html.twig', array(
            'personnage' => $personnage,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personnage entity.
     *
     */
    public function editAction(Request $request, Personnage $personnage)
    {
        $deleteForm = $this->createDeleteForm($personnage);
        $editForm = $this->createForm('AppBundle\Form\PersonnageType', $personnage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnage_edit', array('id' => $personnage->getId()));
        }

        return $this->render('@App/personnage/edit.html.twig', array(
            'personnage' => $personnage,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a personnage entity.
     *
     */
    public function deleteAction(Request $request, Personnage $personnage)
    {
        $form = $this->createDeleteForm($personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personnage);
            $em->flush($personnage);
        }

        return $this->redirectToRoute('personnage_index');
    }

    /**
     * Creates a form to delete a personnage entity.
     *
     * @param Personnage $personnage The personnage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personnage $personnage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnage_delete', array('id' => $personnage->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
