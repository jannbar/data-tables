<x-layout title="Users">
    <h1 class="font-bold tracking-tighter text-xl mb-8 mt-8">Users</h1>
    <div class="mt-8">
        <input type="search" placeholder="Search" role="search">
    </div>
    <div id="user-table-container">
        @include('users.partials.table')
    </div>
</x-layout>
