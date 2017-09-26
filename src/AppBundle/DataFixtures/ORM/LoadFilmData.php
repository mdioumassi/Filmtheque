<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 25/09/17
 * Time: 09:18
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Film;
class LoadFilmData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $film1 = new Film();
        $film1->setTitre("Aventure fantastique");
        $film1->setImage($this->getReference("media1"));
        $film1->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis eaque iste, laborum neque odio praesentium quis unde voluptatibus! Accusamus amet atque dolorem fugit hic molestias pariatur quis. Incidunt.");
        $film1->setCategorie($this->getReference("cat1"));
        $film1->setCreateAt(new \DateTime("now"));
        $manager->persist($film1);

        $film2 = new Film();
        $film2->setTitre("Brice Willis");
        $film2->setImage($this->getReference("media2"));
        $film2->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis eaque iste, laborum neque odio praesentium quis unde voluptatibus! Accusamus amet atque dolorem fugit hic molestias pariatur quis. Incidunt.");
        $film2->setCategorie($this->getReference("cat1"));
        $film2->setCreateAt(new \DateTime("now"));
        $manager->persist($film2);

        $film3 = new Film();
        $film3->setTitre("Film de Guerre");
        $film3->setImage($this->getReference("media3"));
        $film3->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis eaque iste, laborum neque odio praesentium quis unde voluptatibus! Accusamus amet atque dolorem fugit hic molestias pariatur quis. Incidunt.");
        $film3->setCategorie($this->getReference("cat1"));
        $film3->setCreateAt(new \DateTime("now"));
        $manager->persist($film3);

        $film4 = new Film();
        $film4->setTitre("Commando");
        $film4->setImage($this->getReference("media4"));
        $film4->setDescription("Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci at debitis eaque iste, laborum neque odio praesentium quis unde voluptatibus! Accusamus amet atque dolorem fugit hic molestias pariatur quis. Incidunt.");
        $film4->setCategorie($this->getReference("cat1"));
        $film4->setCreateAt(new \DateTime("now"));
        $manager->persist($film4);

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
       return 3;
    }
}