<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function paymentList(): HasMany
    {
        return $this->hasMany(PaymentList::class);
    }

    public function scopeMember(): Builder
    {
        return $this->where('for', 2);
    }

    public function scopeApplicant(): Builder
    {
        return $this->where('for', 1);
    }
}
