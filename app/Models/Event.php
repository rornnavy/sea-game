<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'description',
    ];
    public static function store($request, $id = null)
    {
        $event = $request->only(
            'name',
            'start_time',
            'end_time',
            'description',
        );
        
        $event = self::updateOrCreate(['id' => $id], $event);
        return $event;
    }

    public function ticket():HasMany{
        
        return $this->hasMany(Ticket::class);
    }
    public function team(){
        
        return $this->belongsToMany(Team::class, 'event_teams');
    }

}
