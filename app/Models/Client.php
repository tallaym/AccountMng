<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    /*public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function accountType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(AccountType::class);
    }
*/

public function accounts()
{
    return $this->hasMany(compte::class);
}



}
