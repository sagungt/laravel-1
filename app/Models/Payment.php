<?php

namespace App\Models;

use App\Enums\PaymentStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $casts = [
        'generated_date' => 'date',
        'payment_date' => 'date',
    ];

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function paymentList(): HasMany
    {
        return $this->hasMany(PaymentList::class);
    }

    public static function generateId(): string
    {
        return sprintf('%d%d', date('Y'), rand(100000, 9999999));
    }

    public function scopeUnpaid(): Builder
    {
        return $this->where('status', PaymentStatus::UNPAID);
    }

    public function scopePaid(): Builder
    {
        return $this->where('status', PaymentStatus::PAID);
    }

    public function statusLabel(): string
    {
        return match ($this->getAttribute('status')) {
            PaymentStatus::PAID => 'Sudah Dibayar',
            PaymentStatus::UNPAID => 'Belum Dibayar',
            PaymentStatus::CANCELLED => 'Dibatalkan',
            default => '',
        };
    }
}
