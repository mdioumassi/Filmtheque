<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class CategorieController extends Controller
{
    public function listeAction(){
        $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('AppBundle:Categorie')->findAll();
        if(null === $categories){
            throw $this->createNotFoundException('Not Found');
        }
        return $this->render('@App/Categorie/liste.html.twig', [
            'categories' => $categories
        ]);
    }
}
