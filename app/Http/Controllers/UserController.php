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

        $sortField = $request->input('orderBy', $defaultSortField);
        $sortDirection = $request->input('orderDir', $defaultSortDirection);

        $users = User::orderBy($sortField, $sortDirection)->get();

        $props = [
            'users' => $users,
            'defaultSortField' => $defaultSortField,
            'defaultSortDir' => $defaultSortDirection,
        ];

        if ($request->header('hx-request') && $request->header('hx-target') === 'user-table-container') {
            return view('users.partials.table', $props);
        }

        return view('users.index', $props);
    }
}
