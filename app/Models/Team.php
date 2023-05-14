<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'member',
    ];
    public static function store($request, $id = null)
    {
        $team = $request->only(
            'id',
            'name',
            'member',
        );
        
        $team = self::updateOrCreate(['id' => $id], $team);
        return $team;
    }
    public function event(){
        
        return $this->belongsToMany(Event::class, 'event_teams');
    }
}
