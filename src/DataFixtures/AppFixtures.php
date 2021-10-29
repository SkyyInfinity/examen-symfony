<?php

namespace App\DataFixtures;

use App\Entity\Proprietaire;
use App\Entity\Restaurant;
use Faker;
use App\Entity\Ville;
use DateTime;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');

        for($v = 0; $v < 10; $v++) {
            //ville
            $ville = new Ville();
            $ville->setNom($faker->city);
            
            $manager->persist($ville);

            for($r = 0; $r < 20; $r++) {

                //proprietaire
                $proprietaire = new Proprietaire();
                $proprietaire->setNom($faker->lastName);
                $proprietaire->setPrenom($faker->firstName());
                $proprietaire->setDateNaissance($faker->dateTime('1980-02-25'));

                $manager->persist($proprietaire);

                //restaurant
                $restaurant = new Restaurant();
                $restaurant->setNom($faker->company);
                $restaurant->setAdresse($faker->address);
                $restaurant->setImage($faker->imageUrl($width = 850, $height = 480));
                $restaurant->setVille($ville);
                $restaurant->setProprietaire($proprietaire);

                $manager->persist($restaurant);
            }
        }

        $manager->flush();
    }
}
