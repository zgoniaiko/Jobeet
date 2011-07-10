<?php

namespace Zia\JobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Zia\JobBundle\Entity\Job;
use Zia\JobBundle\Form\JobType;

/**
 * Job controller.
 *
 * @Route("/job")
 */
class JobController extends Controller
{
    /**
     * Lists all Job entities.
     *
     * @Route("/", name="job")
     * @Template()
     */
    public function indexAction()
    {
      $em = $this->getDoctrine()->getEntityManager();
      
      $categories = $em->getRepository('ZiaJobBundle:Category')->findWithActiveJobs(11);
      $maxResults = $em->getRepository('ZiaJobBundle:Category')->countActiveJobs();
      
      return array('categories' => $categories,
                   'maxResults' => $maxResults);
    }

    /**
     * Finds and displays a Job entity.
     *
     * @Route("/{company}/{location}/{id}/{position}", name="job_show", defaults={"company"="noname", "location"="undefined", "position"="undefined"} )
     * @ParamConverter("job", class="ZiaJobBundle:Job")
     * @Template
     */
    public function showAction(Job $job)
    {
    }

    /**
     * Displays a form to create a new Job entity.
     *
     * @Route("/new", name="job_new")
     * @Template()
     */
    public function newAction()
    {
        $job = new Job();
        $form   = $this->createForm(new JobType(), $job);

        return array(
            'job' => $job,
            'form'   => $form->createView()
        );
    }

    /**
     * Creates a new Job entity.
     *
     * @Route("/create", name="job_create")
     * @Method("post")
     * @Template("ZiaJobBundle:Job:new.html.twig")
     */
    public function createAction()
    {
        $job  = new Job();
        $request = $this->getRequest();
        $form    = $this->createForm(new JobType(), $job);

        if ('POST' === $request->getMethod()) {
            $form->bindRequest($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($job);
                $em->flush();

                return $this->redirect($this->generateUrl('job_show', array('id' => $job->getId())));
                
            }
        }

        return array(
            'job' => $job,
            'form'   => $form->createView()
        );
    }

    /**
     * Displays a form to edit an existing Job entity.
     *
     * @Route("/{id}/edit", name="job_edit")
     * @ParamConverter("job", class="ZiaJobBundle:Job")
     * @Template()
     */
    public function editAction(Job $job)
    {
        $editForm = $this->createForm(new JobType(), $job);
        $deleteForm = $this->createDeleteForm($job->getId());

        return array(
            'job'      => $job,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Job entity.
     *
     * @Route("/{id}/update", name="job_update")
     * @ParamConverter("job", class="ZiaJobBundle:Job")
     * @Method("post")
     * @Template("ZiaJobBundle:Job:edit.html.twig")
     */
    public function updateAction(Job $job)
    {
        $editForm   = $this->createForm(new JobType(), $job);
        $deleteForm = $this->createDeleteForm($job->getId());

        $request = $this->getRequest();

        if ('POST' === $request->getMethod()) {
            $editForm->bindRequest($request);

            if ($editForm->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($job);
                $em->flush();

                return $this->redirect($this->generateUrl('job_edit', array('id' => $job->getId())));
            }
        }

        return array(
            'job'      => $job,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Job entity.
     *
     * @Route("/{id}/delete", name="job_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();
 
        if ('POST' === $request->getMethod()) {
             $form->bindRequest($request);
 
             if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $job = $em->getRepository('ZiaJobBundle:Job')->find($id);

                if (!$job) {
                    throw $this->createNotFoundException('Unable to find Job entity.');
                }

                $em->remove($job);
                $em->flush();
             }
         }

        return $this->redirect($this->generateUrl('job'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
