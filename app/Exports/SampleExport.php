<?php

namespace App\Exports;
use App\Product;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class SampleExport implements FromArray, ShouldAutoSize {

    public function array(): array { 

        $products=Product::where('status','active')
        ->select('category_name','id')
        ->get();
        //dd($products);
        $samples = json_decode($products, true);
        $return_arr=array();

        foreach ($samples as $sample) {
            $basic_arr=["Product Name"=>"example...","Product Price"=>"xxxxxx",];
            $new_arr =  array_merge($basic_arr,$sample);
            array_unshift($return_arr, $new_arr);
        }
        
        array_unshift($return_arr, array('Product Name','Product Price', 'Product Category', 'Category ID'));
        //dd($new_arr);
        //dd($return_arr);

        return $return_arr;

    }
    
} 

/* class SampleExport implements FromQuery
{
    use Exportable;

    public function query()
    {
        $products=Product::where('status','active')
        ->select('category_name','id')
        ->get();
        //dd($products);

        foreach ($products as $product) {
            foreach ($product as $pro) {
                $pro->push(["name"=>"name"]);
            }
        }

        

        dd($pro);

        //return Invoice::query();
    }
} */
