<?php

namespace Nasd\TabBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Nasd\TabBundle\Entity\Tabellagenerale;
use Nasd\TabBundle\Form\TabellageneraleType;

use JMS\SecurityExtraBundle\Annotation\Secure;

//use Ps\PdfBundle\Annotation\Pdf;

/**
 * Tabellagenerale controller.
 *
 * @Route("/tabellagenerale")
 */
class TabellageneraleController extends Controller
{
    
/************************/
/* start new environment*/
/************************/
    
    /**
     * @Inject("doctrine")
     */
    protected $doctrine;

    /**
     * @Inject("form.factory")
     */
    protected $formFactory;

    /**
     * @Inject("request")
     */
    protected $request;

    /**
     * @Inject("jms_serializer")
     */
    protected $serializer;

    /**
     * Gets the Element repository
     *
     * @return Doctrine\Common\Persistence\AbstractManagerRegistry
     */
    private function getTabellageneraleRepository()
    {
        return $this
            ->doctrine
            ->getRepository('NasdTabBundle:Tabellagenerale');
    }
    
    /**
     * Reads (all the collection)
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @Rest\View(serializerGroups={"usList"})
     */
    public function cgetAction()
    {
        return $this
                ->getTabellageneraleRepository()
                ->findAll()
        ;
    }

    /**
     * Reads (an element)
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * 
     * @Rest\View(serializerGroups={"usDetail"})
     * @ParamConverter("id", class="NasdTabBundle:Tabellagenerale")
     */
    public function getAction(Tabellagenerale $id)
    {
        return $id;
    }

    /**
     * Creates
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * @ PreAuthorize("isFullyAuthenticated()")
     */
    public function cpostAction()
    {
        return $this->pForm(new Tabellagenerale());
    }

    /**
     * Updates
     *
     * @param  int   $tabellagenerale
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @ PreAuthorize("isFullyAuthenticated()")
     */
    public function putAction($id)
    {
        $tabellagenerale = $this
            ->getTabellageneraleRepository()
            ->find($id)
        ;

        if (!$tabellagenerale instanceof Tabellagenerale) {
            throw new NotFoundHttpException();
        }

        return $this->pForm($tabellagenerale);
    }
    
    /**
     * Deletes
     *
     * @param  int  $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     * @ PreAuthorize("isFullyAuthenticated()")
     */
    public function deleteAction($id)
    {
        $tabellagenerale = $this
            ->getTabellageneraleRepository()
            ->find($id)
        ;

        if (!$tabellagenerale instanceof Tabellagenerale) {
            throw new NotFoundHttpException();
        }

        $this->doctrine->getEntityManager()->remove($tabellagenerale);
        $this->doctrine->getEntityManager()->flush();

        return new Response();
    }

    /**
     * @param Tabellagenerale $tabellagenerale
     * @return \Symfony\Component\HttpFoundation\Response|\FOS\RestBundle\View\View
     */
    protected function pForm(Tabellagenerale $tabellagenerale)
    {
        $statusCode = $tabellagenerale->getId() > 0 ? 204 : 201;
        $form = $this->formFactory->create(new TabellageneraleType(), $tabellagenerale);
        $form->bind($this->request);

        if ($form->isValid()) {
            $em = $this->doctrine->getEntityManager();
            $em->persist($tabellagenerale);
            $em->flush();

            $response = new Response();
            $response->setContent($this->serializer->serialize($tabellagenerale, 'json'));
            $response->setStatusCode($statusCode);

            return $response;
        }

        return View::create($form, 400);
    }
    
    
/**********************/    
/* end new environment*/
/**********************/
// 
//    
//    /**
//     * addimage
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/{id}/addimage", name="tabellagenerale_addimage")
//     * @Template()
//     */
//    public function addImageAction() 
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $entity = $em->getRepository('NasdTabBundle:Tabellagenerale')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Tabellagenerale entity.');
//        }
//
//        $editForm = $this->createForm(new AddnewfileType(), $entity);
//        $deleteForm = $this->createDeleteForm($id);
//
//        return array(
//            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        );
//    }
//    public function updateimage($id, $pathfile) 
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//        $qb = $this->em->createQueryBuilder();
//        $q = $qb->update('models\Tabellagenerale', 'u')
//                ->set('u.pathfile', $qb->expr()->literal($pathfile))
//                ->where('u.id = ?1')
//                ->setParameter(1, $id)
//                ->getQuery();
//        $p = $q->execute();
//        
//    }
//    /**
//     * Lists all Tabellagenerale entities.
//     *
//     * @Route("/", name="tabellagenerale")
//     * @Template()
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $entities = $em->getRepository('NasdTabBundle:Tabellagenerale')->findAll();
//
//        return array('entities' => $entities);
//    }
//
//    /**
//     * Finds and displays a Tabellagenerale entity.
//     *
//     * @Route("/{id}/show", name="tabellagenerale_show")
//     * @Template()
//     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $entity = $em->getRepository('NasdTabBundle:Tabellagenerale')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Tabellagenerale entity.');
//        }
//
//        $deleteForm = $this->createDeleteForm($id);
//
//        return array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView()
//         );
//    }
//
//    /**
//     * Displays a form to create a new Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/new", name="tabellagenerale_new")
//     * @Template()
//     */
//    public function newAction()
//    {
//        $entity = new Tabellagenerale();
//        $form   = $this->createForm(new TabellageneraleType(), $entity);
//
//        return array(
//            'entity' => $entity,
//            'form'   => $form->createView()
//        );
//    }
//
//    /**
//     * Creates a new Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/create", name="tabellagenerale_create")
//     * @Method("post")
//     * @Template("NasdTabBundle:Tabellagenerale:new.html.twig")
//     */
//    public function createAction()
//    {
//        $entity  = new Tabellagenerale();
//        $request = $this->getRequest();
//        $form    = $this->createForm(new TabellageneraleType(), $entity);
//        $form->bindRequest($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getEntityManager();
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('nasd_show', array('id' => $entity->getId())));
//            
//        }
//
//        return array(
//            'entity' => $entity,
//            'form'   => $form->createView()
//        );
//    }
//
//    /**
//     * Displays a form to edit an existing Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/{id}/edit", name="tabellagenerale_edit")
//     * @Template()
//     */
//    public function editAction($id)
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $entity = $em->getRepository('NasdTabBundle:Tabellagenerale')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Tabellagenerale entity.');
//        }
//
//        $editForm = $this->createForm(new TabellageneraleType(), $entity);
//        $deleteForm = $this->createDeleteForm($id);
//
//        return array(
//            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        );
//    }
//
//    /**
//     * Edits an existing Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/{id}/update", name="tabellagenerale_update")
//     * @Method("post")
//     * @Template("NasdTabBundle:Tabellagenerale:edit.html.twig")
//     */
//    public function updateAction($id)
//    {
//        $em = $this->getDoctrine()->getEntityManager();
//
//        $entity = $em->getRepository('NasdTabBundle:Tabellagenerale')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Tabellagenerale entity.');
//        }
//
//        $editForm   = $this->createForm(new TabellageneraleType(), $entity);
//        $deleteForm = $this->createDeleteForm($id);
//
//        $request = $this->getRequest();
//
//        $editForm->bindRequest($request);
//
//        if ($editForm->isValid()) {
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('nasd_show', array('id' => $id)));
//        }
//
//        return array(
//            'entity' => $entity,
//            'form'   => $form->createView()
//        );
////        return array(
////            'entity'      => $entity,
////            'edit_form'   => $editForm->createView(),
////            'delete_form' => $deleteForm->createView(),
////        );
//    }
//
//    /**
//     * Deletes a Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @Route("/{id}/delete", name="tabellagenerale_delete")
//     * @Method("post")
//     */
//    public function deleteAction($id)
//    {
//        $form = $this->createDeleteForm($id);
//        $request = $this->getRequest();
//
//        $form->bindRequest($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getEntityManager();
//            $entity = $em->getRepository('NasdTabBundle:Tabellagenerale')->find($id);
//
//            if (!$entity) {
//                throw $this->createNotFoundException('Unable to find Tabellagenerale entity.');
//            }
//
//            $em->remove($entity);
//            $em->flush();
//        }
//
//        return $this->redirect($this->generateUrl('nasd'));
//    }
//
//    /**
//     * export to pdf a Tabellagenerale entity.
//     *
//     * @Secure(roles="ROLE_ADMIN")
//     * @ Pdf()
//     */
////    public function exporttopdfAction()     
////    {
////        $format = $this->get('request')->get('_format');
////        return $this->render(sprintf('NasdTabBundle:export:exppdf.%s.twig', $format), array());
////    }
//
//    private function createDeleteForm($id)
//    {
//        return $this->createFormBuilder(array('id' => $id))
//            ->add('id', 'hidden')
//            ->getForm()
//        ;
//    }
//    
}
