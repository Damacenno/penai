<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redactions extends Model
{
    protected $table = 'penai_redactions';
    use HasFactory;

    public function corrections()
    {
        return $this->hasMany(Correction::class, 'id_redaction');
    }

    public function user()
    {
        return $this->belongsTo(Users::class, 'id_user');
    }
}
