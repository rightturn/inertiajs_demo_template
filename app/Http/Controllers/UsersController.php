<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
            ->when($request->search, function (Builder $query, string $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return Inertia::render('Users', compact('users'));
    }
}
