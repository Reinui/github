<?php

namespace App\Controller;

use Faker\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class TestController extends AbstractController
{
    #[Route('/test/twig', name: 'app_test_twig')]
    public function index(): Response
    {
        // on utilise la Faker\Factory pour créer un Faker version française
        $faker = Factory::create('fr_FR');
        // on crée un tableau de user 
        $users = [];
        for ($i = 0; $i < 9; $i++){
            $user = [ // maintenant l'objet user est un tableau associatif 
                'name' => $faker->name(),
                'email' => $faker->email(),
                'age' =>$faker->randomNumber(2, false),
                'address' => [
                    'street' => $faker->streetName(),
                    'code_postal' =>$faker->postcode(),
                    'city' => $faker->city(),
                    'country' => $faker->country(),

                ],
            ];
            $users[$i] = $user;
        }

        return $this->render('test/index.html.twig', [
            'title' => 'page accueil',
            'users' => $users,
        ]);
    }
}
