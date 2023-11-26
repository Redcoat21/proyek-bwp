<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $primaryKey = ['username', 'course'];
    public $keyType = ['string', 'int'];
    public $table = 'certificate';
    public $incrementing = false;
    public $timestamps = false;
}
