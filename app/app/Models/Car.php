<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';
    protected $fillable = [
        'description',
        'preview',
        'price',
        'creator_id',
        'car_model_id',
        'city_id'
    ];

    public function getPreviewAttribute($value){
        return env('APP_URL') . '/storage/' . $value;
    }

    public function city(){
        return $this->belongsTo(City::class);

    }

    public function carModel(){
        return $this->belongsTo(CarModel::class);
    }


}
