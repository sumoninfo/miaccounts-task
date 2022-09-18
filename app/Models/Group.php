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
     * @return BelongsTo
     */
    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return HasMany
     */
    public function childrens() {
        return $this->hasMany(self::class, 'parent_id','id')->with('accountHeads');
    }

    public function accountHeads()
    {
        return $this->hasMany(AccountHead::class)->addSelect(['total_amounts' => Transaction::query()
            ->whereColumn('account_head_id', 'account_heads.id')
            ->selectRaw('sum(debit-credit) as total_amounts')
        ]);
    }
}
