<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compte extends Model
{
    use HasFactory;

    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function accountType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountType::class);
    }
}
