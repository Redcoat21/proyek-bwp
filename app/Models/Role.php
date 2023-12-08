<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Role extends Model
{
    use HasFactory;

    public $keyType = "string";
    public $timestamps = false;
    public $primaryKey = "id";

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'role');
    }
}
