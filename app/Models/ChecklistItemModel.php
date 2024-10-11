<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistItemModel extends Model
{
    use HasFactory;

    protected $table = 'checklistItem';

    protected $fillable = ['checklistId', 'name', 'isCompleted'];

    public function checklist()
    {
        return $this->belongsTo(ChecklistModel::class);
    }
}
