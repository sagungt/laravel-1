<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\PaymentStatus;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nim',
        'address',
        'phone',
        'is_enrolled',
        'type'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_enrolled' => 'bool'
    ];

    public function baseQuery(): Builder
    {
        return $this->with(['payments', 'payments.paymentList', 'payments.paymentMethod', 'payments.paymentList.paymentType']);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }

    public function registrationPayment(): Builder|\Illuminate\Database\Eloquent\Model|null
    {
        return $this->payments()->whereHas('paymentList', fn (Builder $query) => $query->where('payment_type_id', 1))->first();
    }

    public function preMemberPayment(): Builder|\Illuminate\Database\Eloquent\Model|null
    {
        return $this->payments()->whereHas('paymentList', fn (Builder $query) => $query->where('payment_type_id', 2))->first();
    }

    public function scopeMember(): Builder
    {
        return $this->baseQuery()->where('type', UserType::MEMBER)->where('is_enrolled', true);
    }

    public function scopePreMember(): Builder
    {
        return $this->baseQuery()->where('type', UserType::PRE_MEMBER)->where('is_enrolled', false);
    }

    public function scopeApplicant(): Builder
    {
        return $this->baseQuery()->where('type', UserType::APPLICANT)->where('is_enrolled', false);
    }

    public function isAdmin(): bool
    {
        return $this->getAttribute('type') === UserType::ADMIN;
    }

    public function isLoggedUser(): bool
    {
        return $this->getAttribute('id') === auth()->id();
    }

    protected static function booted(): void
    {
        static::created(function (User $user) {
            if ($user->getAttribute('type') !== 0) {
                $id = Payment::generateId();
                while (Payment::query()->where('payment_id', $id)->exists()) {
                    $id = Payment::generateId();
                }
                $paymentType = PaymentType::query()->find(1);
                $payment = $user->payments()->create([
                    'payment_method_id' => 1,
                    'payment_id' => $id,
                    'total' => $paymentType->getAttribute('amount'),
                    'status' => PaymentStatus::UNPAID,
                    'generated_date' => now()
                ]);
                PaymentList::query()->create([
                    'payment_id' => $payment->getAttribute('id'),
                    'payment_type_id' => $paymentType->getAttribute('id'),
                ]);
            }
        });
    }
}
