<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Correction extends Model
{
    protected $table = 'penai_corrections';
    protected $fillable = [
        'id_user',
        'id_redaction',
        'nota_geral'
    ];
    use HasFactory;

    public function redaction()
    {
        return $this->belongsTo(Redactions::class, 'id_redaction');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function details()
    {
        return $this->hasMany(CorrectionDetails::class, 'id_correction');
    }
}
