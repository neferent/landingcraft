<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class Id extends Controller
{
    public function generateId(): Response
    {
        $client = new Client();
        $nanoId = $client->generateId($size = 8);
        return response($nanoId);
    }
}
