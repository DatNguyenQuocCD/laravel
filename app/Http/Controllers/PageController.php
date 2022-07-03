<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Facades\Date;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;
class PageController extends Controller
{
    public function getIndex(){    
    $slide= Slide::all();       
    $new_product=Product::where('new',1)->get();
    return view('page.trangchu',compact('slide','new_product'));
    }
    public function getLoaiSp($type)
    {
        $sp_theoloai = Product::where('id_type', $type)->get();
        $type_product = ProductType::all();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loaisanpham', compact('sp_theoloai', 'type_product', 'sp_khac'));
    }
}
