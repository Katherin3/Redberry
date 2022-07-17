<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CandidateStatus extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function getComment(): string
    {
        return $this->comment;
    }
}
