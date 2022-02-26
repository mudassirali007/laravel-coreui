<?php

namespace App\Models;

use BlueFeather\EloquentFileMaker\Database\Eloquent\FMModel;


class InventoryDetail extends FMModel
{
    protected $connection = 'filemaker';
    protected $layout = "Product Details";
    protected $dateFormat = 'Y-n-j'; // 7/1/1920 16:01:01

//    protected $casts = [
//        'Inventory Transactions::Date' => 'date',
//        'Date' => 'date',
//    ];
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
