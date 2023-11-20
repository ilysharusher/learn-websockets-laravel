<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SendLikeRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /*public function index()
    {
        //
    }

    public function create()
    {
        //
    }*/

    public function store(SendLikeRequest $request): \Illuminate\Http\JsonResponse
    {
        $likeString = 'You have liked ' . $request->validated()['from_user_id'] . '!';

        return response()->json([
            'likeString' => $likeString,
        ]);
    }

    public function show(User $user): \Inertia\Response|\Inertia\ResponseFactory
    {
        return inertia('User/Show', compact('user'));
    }

    /*public function edit(User $user)
    {
        //
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }*/
}
