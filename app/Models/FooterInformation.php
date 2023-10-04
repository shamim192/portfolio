<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'info','copy_right','powered_by'
    ];
}
