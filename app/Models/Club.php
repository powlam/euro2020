<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country',
        'league',
    ];

    /** Relationships */

    /**
     * The players that belong to this club.
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
