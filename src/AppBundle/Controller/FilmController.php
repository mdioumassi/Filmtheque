<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Film;
use AppBundle\Form\FilmType;
class FilmController extends Controller
{
    /**
     * @Route("/", name="film_home")
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('AppBundle:Film')->findAll();
        if (null === $films){
            throw $this->createNotFoundException("Not Found");
        }
        return $this->render('@App/film/index.html.twig', [
            'films' => $films
        ]);
    }

    /**
     * @Route("/film/ajout", name="film_add")
     */
    public function ajoutAction(Request $request){
        $film = new Film();
        $form = $this->createForm(FilmType::class, $film);

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($film);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Film bien enregistré');
            return $this->redirectToRoute('film_home');
        }
       return $this->render('@App/film/ajout.html.twig', [
           'form' => $form->createView()
       ]);
    }

    /**
     * @Route("/film/detail/{id}", name="detail_film")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailAction(Request $request){
        $film_id = $request->get('id');
        $film = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Film')
                ->find($film_id);
        if(null === $film){
            throw $this->createNotFoundException('Not Found');
        }

        return $this->render('@App/film/detail.html.twig', [
           'film' => $film
        ]);
    }

    /**
     * @Route("/film/categorie/{id}", name="categorie")
     */
    public function categorieAction(Request $request){
        $cat_id = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $films = $em->getRepository('AppBundle:Film')->findByCategorieId($cat_id);
        if(null === $films){
            throw  $this->createNotFoundException('Not Found');
        }

        return $this->render('@App/film/index.html.twig', [
            'films' => $films
        ]);
    }
}
