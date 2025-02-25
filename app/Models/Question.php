<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'competition_id',
        'question',
        'answer',
        'is_active',
        'mark_question',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }
}
