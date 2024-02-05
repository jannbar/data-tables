<x-layout title="Users">
    <h1 class="font-bold tracking-tighter text-xl mb-8 mt-8">Users</h1>
    <div class="mb-4">
        <x-text-input name="search" type="search" class="text-sm w-full sm:w-1/4" :value="request('search')" autocomplete="off"
            placeholder="Search by name…" hx-get="/" hx-target="#user-table-container" hx-replace-url="true"
            hx-trigger="keyup changed delay:500ms, search" />
    </div>
    <div id="user-table-container">
        @include('users.partials.table')
    </div>
</x-layout>
