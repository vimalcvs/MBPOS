<?php

namespace App\Models;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Requisition extends Model
{
    protected $dates = ['requisition_date', 'complete_date'];

    public function requisitionProducts()
    {
        return $this->hasMany(RequisitionProduct::class)->with('product');
    }

    public function requisitionTo()
    {
        return $this->belongsTo(Branch::class, 'requisition_to')->withTrashed();
    }

    public function requisitionFrom()
    {
        return $this->belongsTo(Branch::class, 'requisition_from')->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        self::creating(function($model){
            $model->created_by =  auth()->user()->id;
            $model->requisition_date =  Carbon::now();
            $model->requisition_from =  auth()->user()->employee->branch_id;
            $model->requisition_id =  get_option('requisition_id_prefix').str_pad(Requisition::count()+1,get_option('invoice_length'),0,STR_PAD_LEFT);
        });
    }
}
