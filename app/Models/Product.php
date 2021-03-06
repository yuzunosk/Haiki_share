<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = ['id'];
    use Sortable; //追加
    public $sortable = ['id,name , category , price , regular_price , sellby , store_id']; //ソート対象指定

    public function store()
    {
        //storeに属する
        //storeと多対1の関係性
        return $this->belongsTo('App\Models\Store');
    }

    public function buy()
    {
        //buyデータとの1対1のリレーション
        //フォーリンキー名はカスタムしてるので、第二引数に指定する

        return $this->hasOne('App\Models\Buy', 'buy_product_id');
    }
}
