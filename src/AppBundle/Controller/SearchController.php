<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Film;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class SearchController extends Controller
{
    /**
     * @Route("/film/recherche", name="film_search")
     */
    public function rechercheAction(){
        $film = new Film();
        $form = $this->createFormBuilder($film)
                      ->add('titre', TextType::class)
                       ->add('categorie')
//                        ->add('createAt', EntyType::class, [
//                            'class'=>'AppBundle\Entity\Film',
//                            'choice_label'=>'creatyeAt'
//                        ]
                        ->add('ok', SubmitType::class, [
                            'label'=>'OK',
                            'attr'=>['class'=>'btn btn-primary']
                        ])
                       ->getForm();
        return $this->render('@App/Recherche/recherche.html.twig',[
            'form' => $form->createView()
        ]);
    }
}
