<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'name'];

    /**
     * Get the group parent that owns the group.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get the group childrens for the group.
     *
     * @return HasMany
     */
    public function childrens(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->with('accountHeads');
    }

    /**
     * Get the account heads for the group.
     *
     * @return HasMany
     */
    public function accountHeads(): HasMany
    {
        return $this->hasMany(AccountHead::class)->addSelect(['total_amounts' => Transaction::query()
            ->whereColumn('account_head_id', 'account_heads.id')
            ->selectRaw('sum(debit-credit) as total_amounts')
        ]);
    }
}
