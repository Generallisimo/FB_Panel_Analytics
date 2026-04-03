<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function supportBuyers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'buyer_support', 'support_id', 'buyer_id');
    }

    public function buyerSupports(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'buyer_support', 'buyer_id', 'support_id');
    }

    public function sellerBuyers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'buyer_seller', 'seller_id', 'buyer_id');
    }

    public function buyerSellers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'buyer_seller', 'buyer_id', 'seller_id');
    }

    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'buyer_team', 'buyer_id', 'team_id');
    }
}
