<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 25/09/17
 * Time: 09:01
 */

namespace AppBundle\DataFixtures\ORM;


use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categorie;

class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
      $cat1 = new Categorie();
      $cat1->setNom("Action");
      $cat1->setImage($this->getReference("media1"));
      $manager->persist($cat1);

      $cat2 = new Categorie();
      $cat2->setNom("Aventure");
      $cat2->setImage($this->getReference("media2"));
      $manager->persist($cat2);

      $cat3 = new Categorie();
      $cat3->setNom("Policier");
      $cat3->setImage($this->getReference("media3"));
      $manager->persist($cat3);

      $cat4 = new Categorie();
      $cat4->setNom("Science Fiction");
      $cat4->setImage($this->getReference("media4"));
      $manager->persist($cat4);

      $manager->flush();


      $this->addReference('cat1', $cat1);
      $this->addReference('cat2', $cat2);
      $this->addReference('cat3', $cat3);
      $this->addReference('cat4', $cat4);
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}