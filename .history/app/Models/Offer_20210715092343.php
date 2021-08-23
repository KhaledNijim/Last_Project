<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    //protected $table = "table_name"; // تضع هنا اسم الجدول الذي لديه اسم مختلف عن اسم المووديل الذي تريد ربطه به وهكذا بتم الربط بينهم
    protected $fillable=['name','price','photo','created_at','updated_at','details']; //العناصر التي توضع هنا  تستطيع الأضافة عليها في  الجدول، أي تستطيع التخزين داخلها
    protected $hidden=['created_at','updated_at']; // العناصر التي توضع هنا لا يمكن إرجاعها، مثل عند أستدعاء الجدول كامل سيتم أخفاء العناصر الموضوعة هنا
    public $timestamp = false;

}
