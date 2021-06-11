<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'birth_year',
        'sheet_name',
        'sheet_number',
        'team_id',
        'club_id',
    ];

    /** Relationships */

    /**
     * Get the team the player belongs to.
     */
    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    /**
     * Get the club the player belongs to.
     */
    public function club()
    {
        return $this->belongsTo(Club::class);
    }

}
