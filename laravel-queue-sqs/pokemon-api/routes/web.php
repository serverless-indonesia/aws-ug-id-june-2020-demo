<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Storage;
use App\Jobs\ExampleJob;
use App\Jobs\HelloWorldJob;
use Ramsey\Uuid\Uuid;


$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/pokemon', function () use ($router) {
    
    $vals = explode("\n", Storage::disk('local')->get('pokemon.csv'));

    $pokemons = [];
    $num = 0;
    foreach($vals as $data) {

        $data = explode(",", $data);

        if (count($data) == 1){
            continue;
        }

        if ($data[1] == "Name"){
            continue;
        }

        $pokemon = [
            "No" => $num,
            "Name" => $data[1],
            "Type1" => $data[2],
            "Type2" => $data[3],
            "Total" => $data[4],
            "HP" => $data[5],
            "Attack" => $data[6],
            "Defense" => $data[7],
            "SpecialAttack" => $data[8],
            "SpecialDefense" => $data[9],
            "Speed" => $data[10],
            "Generation" => $data[11],
            "Legendary" => $data[12]
        ];

        array_push($pokemons, $pokemon);
        $num++;
    }

    return response()->json($pokemons);
});

$router->get('/test-queue', function () use ($router){
    $uuid = Uuid::uuid4();
    dispatch(new ExampleJob);
    dispatch(new HelloWorldJob($uuid, "Hello world dari Serverless ID!"));

    return "ExampleJob dan HelloWorldJob sedang dijalankan!";
});