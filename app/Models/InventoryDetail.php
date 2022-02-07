<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class InventoryDetail extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Product Details";
    protected $primaryKey = 'ProductID';

    protected $fillable = [
        'Description',
        'Manufacturer',
        'Location',
        'Date',
        'ModelYear',
        'BarCode',
        'PartNumber',
        'StockValue',
        'UnitsOnHand',
        'Taxable',
        'UnitPrice',
        'UnitCost',
        'ReorderLevel',
        'Category',
        'Name',
        'Image'
    ];

}
