<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 12;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'country',
        'group',
    ];

    /** var char[] $groups */
    public static $groups = [ 'A', 'B', 'C', 'D', 'E', 'F' ];

    /** Relationships */

    /**
     * The players that belong to this team.
     */
    public function players()
    {
        return $this->hasMany(Player::class);
    }

}
