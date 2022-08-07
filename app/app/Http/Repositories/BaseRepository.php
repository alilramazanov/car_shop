<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Builder;

abstract class BaseRepository
{

    protected $modelBuilder;

    public function __construct(){
        $this->modelBuilder = $this->makeQueryModel();
    }

    protected abstract function makeQueryModel(): Builder;



}