<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redactions extends Model
{
    protected $table = 'penai_redactions';
    protected $fillable = [
        'title',
        'description',
        'redaction_intro',
        'redaction_desenvolv',
        'redaction_desenvolv2', 
        'redaction_conclusion',
        'created_at'
    ];
    use HasFactory;

    public function corrections()
    {
        return $this->hasMany(Correction::class, 'id_redaction');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
