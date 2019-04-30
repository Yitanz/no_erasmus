<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManelTest extends TestCase
{
  use RefreshDatabase;

    /*Creo usuaris de gestio*/
    /** @setUp for database seeding */
      public function setUp(): void
      {
          parent::setUp();
          $this->artisan('migrate:fresh');
          $this->seed('RolsTableSeeder');
          $this->seed('HorarisTableSeeder');
          $this->seed('DadesEmpleatSeeder');
          $this->seed('UsersTableSeeder');
      }
    /*Entro amb l'usuari paco a gestio atraccions*/
    /**Test*/
    public function testExample()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

      $this->actingAs($user)
        ->get('gestio/atraccions')
        ->assertStatus(200);
    }

    /*Creo una atraccio de nom paquito lo peluquero */

    public function crear_Atraccions()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

        $atraccio = $factory(\App\Atraccion::class)->create([
        'nom_atraccio'=> "Paquito lo peluquero",
        'tipus_atraccio'=> 1,
        'data_inauguracio'=> $faker->date,
        'altura_min'=> rand (  150 ,  220 ),
        'altura_max'=> rand (  150 ,  220 ),
        'accessibilitat'=> 1,
        'acces_express'=> 1,
        'descripcio'=> $faker->name,
        'votacions'=> $faker->name,
        'path'=> $faker->name
      ]);

        $this->actingAs($user)
        ->get('gestio/atraccions')
        ->assertSee('Paquito lo peluquero')
            ->assertStatus(200);
    }
    /*Busco una atraccio que no existeix i me retorna un error*/

    public function llistar_noExiseixAtraccio()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();


        $this->actingAs($user)
        ->get('gestio/atraccions/999999/edit')
            ->assertStatus(404);
    }

    public function atraccio_buida()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

      DB::table('atraccions')->truncate();

      $this->actingAs($user)
        ->get('gestio/atraccions')
        ->assertStatus(202);
    }
// vendor/bin/phpunit

}
