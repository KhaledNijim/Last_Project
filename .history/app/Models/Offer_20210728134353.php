<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    //protected $table = "table_name"; // تضع هنا اسم الجدول الذي لديه اسم مختلف عن اسم المووديل الذي تريد ربطه به وهكذا بتم الربط بينهم
    protected $fillable=['name_ar','name_en','price','photo','created_at','updated_at','details_ar','details_en']; //العناصر التي توضع هنا  تستطيع الأضافة عليها في  الجدول، أي تستطيع التخزين داخلها
    protected $hidden=['created_at','updated_at']; // العناصر التي توضع هنا لا يمكن إرجاعها، مثل عند أستدعاء الجدول كامل سيتم أخفاء العناصر الموضوعة هنا
    //public $timestamps = false; // توقف عمل تسجيل الوقت التلقائي في الجدول وتكون تعمل بشكل تلقائي وعند عمل فولس توقف عملها

}
