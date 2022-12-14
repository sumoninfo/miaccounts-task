<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\HigherOrderBuilderProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class AccountHead extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the group that owns the account head.
     *
     * @return BelongsTo
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    /**
     *  Get the transactions for the account head.
     *
     * @return HasMany
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     *  Get the total transactions amount (debit-credit)
     *
     * @return float
     */
    public function getTotalAmounts(): float
    {
        $balance = $this->transactions()
                       ->select(DB::raw('sum(debit-credit) as total_amounts'))
                       ->first()->total_amounts ?? 0;
        return floatval($balance);
    }
}
