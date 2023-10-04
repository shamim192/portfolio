<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogList extends Model
{
    use HasFactory;
    protected $fillable = [
        'image','title','category_id','description'
    ];
    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }
}
