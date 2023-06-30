<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hidehalo\Nanoid\Client;
use Hidehalo\Nanoid\GeneratorInterface;

class NanoId extends Model
{
    use HasFactory;

    public function generateNanoId()
    {
        $chars = 21;
        $client = new Client();
        return $client->generateId($size = $chars);
    }
}
