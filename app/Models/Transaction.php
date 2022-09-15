<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['account_head_id', 'date', 'debit', 'credit'];

    /**
     * Get the account head that owns the transaction.
     *
     * @return BelongsTo
     */
    public function accountHead(): BelongsTo
    {
        return $this->belongsTo(AccountHead::class);
    }
}
