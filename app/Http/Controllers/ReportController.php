<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccountHeadResource;
use App\Models\AccountHead;
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
        $query = AccountHead::with('transactions')->get();
        return AccountHeadResource::collection($query);
    }
}
