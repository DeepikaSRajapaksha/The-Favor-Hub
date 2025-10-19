<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class MenuCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'image'];

    // Automatically generate slug when creating/updating
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = Str::slug($model->name);
        });
    }

    // // Relationship (optional): a category can have many menus
    // public function menus()
    // {
    //     return $this->hasMany(Menu::class);
    // }
}
