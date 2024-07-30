<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'client',
        'start_date',
        'end_date',
        'status',
        'budget',
        'repository',
        'tech_stack',
        'project_manager',
        'team_members',
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
