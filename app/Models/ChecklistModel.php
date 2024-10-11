<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistModel extends Model
{
    use HasFactory;

    protected $table = 'checklist';

    protected $fillable = ['name'];

    public function items()
    {
        return $this->hasMany(CheckListItemModel::class);
    }
}
