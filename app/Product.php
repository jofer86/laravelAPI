<?php

namespace App;

use App\Seller;
use App\Category;
use App\Transaction;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const PRODUCTO_DISPONIBLE = 'available';
    const PRODUCTO_NO_DISPONIBLE = 'not available';



    protected $fillable = [
      'name',
      'description',
      'quantity',
      'status',
      'image',
      'seller_id',
    ];

    public function isAvailable()
    {
      return $this->status == Product::PRODUCTO_DISPONIBLE;
    }

    public function seller()
    {
      return $this->belongsTo(Seller::class);
    }

    public function transaction()
    {
      return $this->hasMany(Transaction::class);
    }

    public function categories()
    {
      return $this->belongsToMany(Category::class);
    }


}
