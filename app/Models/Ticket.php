<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'start_time',
        'end_time',
        'zone',
        'user_id',
        'event_id',
    ];
    public static function store($request, $id = null)
    {
        $ticket = $request->only(
            'start_time',
            'end_time',
            'zone',
            'user_id',
            'event_id',
        );
        
        $ticket = self::updateOrCreate(['id' => $id], $ticket);
        return $ticket;
    }
    public function event():BelongsTo{
        
        return $this->BelongsTo(Event::class);
    }

    public function user():BelongsTo{
        
        return $this->BelongsTo(User::class);
    }


}
