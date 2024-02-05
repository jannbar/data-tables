<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request): View
    {
        $defaultSortField = 'id';
        $defaultSortDirection = 'asc';

        $sortField = $request->input('sort', $defaultSortField);
        $sortDirection = $request->input('sortDir', $defaultSortDirection);

        $searchTerm = $request->input('search');

        $users = User::where('name', 'like', "%$searchTerm%")
            ->orderBy($sortField, $sortDirection)
            ->paginate(10);

        $props = [
            'users' => $users->appends(['sort' => $sortField, 'sortDir' => $sortDirection, 'search' => $searchTerm]),
            'defaultSortField' => $defaultSortField,
            'defaultSortDir' => $defaultSortDirection,
        ];

        if ($request->header('hx-request') && $request->header('hx-target') === 'user-table-container') {
            return view('users.partials.table', $props);
        }

        return view('users.index', $props);
    }
}
