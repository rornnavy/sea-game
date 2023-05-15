<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'member',
        'user_id',
    ];
    public static function store($request, $id = null)
    {
        $team = $request->only(
            'id',
            'name',
            'member',
            'user_id',
        );
        
        $team = self::updateOrCreate(['id' => $id], $team);
        return $team;
    }
    public function user():BelongsTo{
        
        return $this->BelongsTo(User::class);
    }
    public function event(){
        
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }
}
