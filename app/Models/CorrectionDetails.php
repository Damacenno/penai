<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectionDetails extends Model
{
    protected $table = 'penai_correction_details';
    use HasFactory;

     public function corrections()
    {
        return $this->hasMany(Correction::class, 'id');
    }
}
