<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'completed',
        'user_id'
    ];

    public function users()
    {
      return $this->beloongsTo(User::class);
    }
}
