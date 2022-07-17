<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = [];

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function getPosition(): string
    {
        return $this->position;
    }

    public function getMinSalary(): ?int
    {
        return $this->min_salary;
    }

    public function getMaxSalary(): ?int
    {
        return $this->max_salary;
    }

    public function getLinkedinUrl(): ?string
    {
        return $this->linkedin_url;
    }

    public function skill(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class);
    }

    public function status(): BelongsToMany
    {
        return $this->belongsToMany(Status::class)
            ->withPivot('comment');
    }
}
