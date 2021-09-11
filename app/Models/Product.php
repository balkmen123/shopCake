<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base;

class Product extends Base {

    use HasFactory;
    protected $table= "products";
    public $title = "Sản phẩm";
    public function product_type(){
        return $this->belongsTo('App\Product','id_type','id');
    }
    public function bill_detail(){
        return $this->hasMany('App\BillDetail','id_product','id');
    }
    public function configs() {
        $defaultListtingConfigs = parent::defaultListingConfigs();
        $listingConfigs =  array(
            array(
                'field' => 'id',
                'name' => 'ID',
                'type' => 'text',
                'filter' => 'equal',
                'sort' => true,
                'listing' => true,
                'editing' => false
            ),
            array(
                'field' => 'name',
                'name' => 'Tên sản phẩm',
                'type' => 'text',
                'filter' => 'like',
                'sort' => true,
                'listing' => true,
                'editing' => true,
                'validate' => 'required|max:100'
            ),
            array(
                'field' => 'image',
                'name' => 'Ảnh sản phẩm',
                'type' => 'image',
                'listing' => true,
                'editing' => true
            ),
            array(
                'field' => 'price',
                'name' => 'Giá sản phẩm',
                'type' => 'number',
                'filter' => 'between',
                'sort' => true,
                'listing' => true,
                'editing' => true,
                'validate' => 'required|Numeric'
            ),
            array(
                'field' => 'content',
                'name' => 'Nội dung sản phẩm',
                'type' => 'ckeditor',
                'listing' => false,
                'editing' => true
            )
        );
        return array_merge($listingConfigs, $defaultListtingConfigs);
    }
}
