<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountHeadResource;
use App\Http\Resources\GroupResource;
use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReportController extends Controller
{
    /**
     *  get report
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function report(Request $request)
    {
        $query = Group::query()->where('parent_id', null)
            ->with(['childrens.childrens', 'accountHeads'])
            ->get();
        return GroupResource::collection($query);
       /* $query = AccountHead::addSelect(['total_amounts' => Transaction::query()
            ->whereColumn('account_head_id', 'account_heads.id')
            ->selectRaw('sum(debit-credit) as total_amounts')
        ])->get();
        return AccountHeadResource::collection($query);*/
    }
}
