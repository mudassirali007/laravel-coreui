<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class Inventory extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Inventory List";


}
