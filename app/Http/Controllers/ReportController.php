<?php

namespace App\Http\Controllers;

use App\Http\Resources\GroupResource;
use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ReportController extends Controller
{
    /**
     *  get report
     *
     * @return AnonymousResourceCollection
     */
    public function report1()
    {
        $query = Group::query()->where('parent_id', null)
            ->with(['childrens.childrens', 'accountHeads'])
            ->get();
        return GroupResource::collection($query);
    }

    /**
     *  get report 2
     *
     * @return JsonResponse
     */
    public function report2()
    {
        $query = AccountHead::with('group.parent.parent')->addSelect(['total_amounts' => Transaction::query()
            ->whereColumn('account_head_id', 'account_heads.id')
            ->selectRaw('sum(debit-credit) as total_amounts')
        ])->get()->map(function (AccountHead $accountHead) {
            $group_1 = $group_2 = $group_3 = '';
            if (isset($accountHead->group->parent->parent)) {
                $group_1 = $accountHead->group->parent->parent->name;
                $group_2 = $accountHead->group->parent->name;
                $group_3 = $accountHead->group->name;
            } elseif (isset($accountHead->group->parent)) {
                $group_1 = $accountHead->group->parent->name;
                $group_2 = $accountHead->group->name;
            } elseif (isset($accountHead->group)) {
                $group_1 = $accountHead->group->name;
            }
            return [
                'id'            => $accountHead->id,
                'name'          => $accountHead->name,
                'total_amounts' => $accountHead->total_amounts,
                'group_1'       => $group_1,
                'group_2'       => $group_2,
                'group_3'       => $group_3,
            ];
        });
        return response()->json($query);
    }
}
