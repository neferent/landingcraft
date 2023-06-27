<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;


class Id extends Model
{
    use HasFactory;

    public function generateId()
    {
        $client = new Client();
        $nanoId = $client->generateId($size = 21);
        return $nanoId;
    }
}
