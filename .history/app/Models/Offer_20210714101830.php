<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
 //   protected $table = "table_name"; // تضع هنا اسم الجدول الذي لديه اسم مختلف عن اسم المووديل الذي تريد ربطه به وهكذا بتم الربط بينهم
protected $fillable=['name','price','photo','created_at','updated_at'];		
protected $hidden=[]; 
}
