<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'location',
        'capacity',
        'image',
        'date',
        'category_id',
        'organizer_id',
        'auto',
        'deleted_at'
    ];
    public function organizer(){
        return  $this->belongsTo(Organizer::class , 'organizer_id');
    }
    public function category(){
        return  $this->belongsTo(Category::class , 'category_id');
    }

}
