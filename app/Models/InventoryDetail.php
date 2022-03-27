<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class InventoryDetail extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Product Details";
    protected $primaryKey = "id";
    protected $dateFormat = 'Y-n-j'; // year/month/day
    protected $fieldMapping = [
        'Inventory Transactions' => 'InventoryTransactions'
    ];
    protected $casts = [
        'Date' => 'date'
    ];
    /*protected $fillable = [
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
        'Image',
        'Inventory Transactions'
    ];*/



}
