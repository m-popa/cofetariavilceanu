<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Order;
use Faker\Factory;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'nume'             => $faker->firstName.' '.$faker->lastName,
        'detalii_persoana' => $faker->randomElement([$faker->firstName.' Piata',$faker->firstName.' Rebeca',$faker->firstName.' Anna',$faker->firstName.' Helios',$faker->firstName.' Din Traian', $faker->firstName.' Electricianul', $faker->firstName.' Restaurant Simone']),
        'detalii'          => $faker->randomElement(['Tort Diplomat 2 KG', 'Tort Ciocolata 3 KG', 'Prajituri de casa 3 buc', 'Savarine 10 buc', 'Prajituri de casa 2 buc', 'Savarine 5 buc', 'Tort Diplomat 4 KG', 'Tort Diplomat 3 KG', 'Tort Ciocolata 1 KG', 'Tort Ciocolata 5 KG', 'Tort Ciocolata 3 KG, Tort Diplomat 2 KG, Prajituri de casa 2 buc']),
        'detalii_finisare' => $faker->randomElement(['Firsca, Ciocolata', 'Blat insiropat', 'Blat Cacao', 'Blat cocos, alune pe margine', 'Decor alb si rosu']),
        'mesaj'            => $faker->lexify('La mulți ani').' '.$faker->firstName.'!',
        'numar_telefon'    => $faker->phoneNumber,
        'adresa'           => $faker->streetAddress,
        'avans'            => $faker->numberBetween(10, 500),
        'livrare'          => $faker->boolean,
    ];
});
