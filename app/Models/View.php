<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'device', 'browser', 'platform'];

    public function getDeviceAttribute()
    {
        $userAgent = $this->device; // أو أي متغير فيه User-Agent
        preg_match('/\(([^)]+)\)/', $userAgent, $matches);

        if (!empty($matches[1])) {
            return explode(';', $matches[1])[0]; // أول جزء بعد القوس
        }

        return 'Unknown Device';
    }
}
