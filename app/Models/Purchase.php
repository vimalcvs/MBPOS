<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchase extends Model
{
    use SoftDeletes;

    protected $dates = ['purchase_date'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class)->withTrashed();
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class)->withTrashed();
    }

    public function purchaseProducts()
    {
        return $this->hasMany(PurchaseProduct::class)->with('product');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function($model){
            $model->created_by =  auth()->user()->id;
            $model->purchase_date =  Carbon::now();
            $model->branch_id =  auth()->user()->employee->branch_id;
            $model->invoice_id = get_option('purchase_invoice_prefix').str_pad(Purchase::withTrashed()->count()+1,get_option('invoice_length'),0,STR_PAD_LEFT);
        });
    }
}
