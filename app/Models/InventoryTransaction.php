<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class InventoryTransaction extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "InventoryTransactions";
    protected $primaryKey = "id";
    protected $dateFormat = 'Y-n-j'; // year/month/day

    protected $casts = [
        'Date' => 'date'
    ];



}
