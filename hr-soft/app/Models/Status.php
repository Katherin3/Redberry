<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];
    const INITIAL_STATUS = 1;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCreatedAt(): string
    {
        return Carbon::parse($this->created_at)->toDateTimeString();
    }
}
