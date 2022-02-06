<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class InventoryDetail extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Product Details";
    protected $primaryKey = 'ProductID';

}
