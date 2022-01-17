<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Resources\Api\StatusCollection;

class TestController extends Controller
{
    /**
     * Show all School orders according to defined test
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return \Illuminate\Http\LoginRequest
     */
    public function orderSchoolsTest(Request $request)
    {
        $test = Test::with('order.school')->find($request->test_id);
        if ($test)
            return (new StatusCollection(true, trans('api.orderSchools'), $test->order))
                ->response()->setStatusCode(200);
        else
            return (new StatusCollection(false, trans('api.test_not_valid')))->response()->setStatusCode(404);
    }
}
