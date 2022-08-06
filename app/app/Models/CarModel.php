<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;
    protected $table = 'car_models';
    protected $fillable = [
        'name',
        'type_drive',
        'type_engine',
        'brand_id',
    ];


//    Drive types
    const FULL_DRIVE = 'full_drive';
    const REAR_DRIVE = 'rear_drive';
    const FRONT_DRIVE = 'front_drive';


//    Engine's type
    const PETROL_ENGINE = 'petrol_engine';
    const DIESEL_ENGINE = 'diesel_engine';
    const HYBRID_ENGINE = 'hybrid_engine';

    public function brand(){
        return $this->belongsTo(Brand::class);
    }


}
