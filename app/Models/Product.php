<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Product extends Model
{
    use HasFactory , WithPagination , WithoutUrlPagination;
    protected $fillable = ["name","desc","image","quantity","price"];
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite(){
        return $this->favorites()->where('user_id' , Auth::user()->id)->exists();
    }
}
