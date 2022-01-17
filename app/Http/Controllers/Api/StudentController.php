<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Resources\Api\StatusCollection;

class StudentController extends Controller
{
    /**
     * Get logged in student tests
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return \Illuminate\Http\LoginRequest
     */
    public function studentTests(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        if ($user) {
            if (count($user->tests) > 0)
                return (new StatusCollection(true, trans('api.user_test'), $user->tests))
                    ->response()->setStatusCode(200);
            else
                return (new StatusCollection(false, trans('api.user_has_no_tests')))->response()->setStatusCode(404);
        } else {
            return (new StatusCollection(false, trans('api.student_not_valid')))->response()->setStatusCode(404);
        }
    }

    /**
     * Show all student test in pages
     *
     * @param  \Illuminate\Http\LoginRequest  $request
     * @return \Illuminate\Http\LoginRequest
     */
    public function studentsTests(Request $request)
    {
        $students = User::with('tests')->get();
        $page = $request->get('page', 1);
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;
        $count = count($students);
        return new LengthAwarePaginator($students, $count, $perPage, $offset);
    }
}
