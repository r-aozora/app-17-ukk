<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'slug', 'judul', 'penulis', 'penerbit', 'tahun', 'deskripsi', 'gambar', 'stok', 'pinjam', 'kategori_id'];

    protected $guarded = [];

    protected $primaryKey = 'id';

    protected $table = 'buku';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class, 'buku_id');
    }
}