<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class Product extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Product Details";

}
