<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubPackage extends Model
{
    use HasFactory;

    protected $table     = 'sub_package';
    public $primaryKey   = 'id';
    protected $keyType   = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'id_package',
        'sub',
    ];

    public function package(){
        return $this->belongsTo(Package::class, "id_package");
    }
}
