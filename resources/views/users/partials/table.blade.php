<x-table hx-target="#user-table-container" :$defaultSortField :$defaultSortDir>
    <x-table.head>
        <x-table.row>
            <x-table.heading sortable field="id">ID</x-table.heading>
            <x-table.heading sortable field="name">Name</x-table.heading>
            <x-table.heading sortable field="email">Email</x-table.heading>
            <x-table.heading>Actions</x-table.heading>
        </x-table.row>
    </x-table.head>
    <x-table.body>
        @forelse ($users as $user)
            <x-table.row class="even:bg-gray-50">
                <x-table.cell class="tabular-numbers font-medium">{{ $user->id }}</x-table.cell>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
                <x-table.cell class="inline-flex gap-x-2.5">
                    <a href="/users/{{ $user->id }}" class="text-gray-400 hover:text-gray-500">
                        <x-icons.eye />
                        <span class="sr-only">View</span>
                    </a>
                    <a href="/users/{{ $user->id }}/edit" class="text-gray-400 hover:text-gray-500">
                        <x-icons.edit />
                        <span class="sr-only">Edit</span>
                    </a>
                    <form action="/" method="POST" x-init
                        @submit="if (!window.confirm('Are you sure you want to delete this user?')) { event.preventDefault() }">
                        @csrf
                        @method('delete')
                        <button class="text-gray-400 hover:text-gray-500">
                            <x-icons.trash />
                            <span class="sr-only">Delete</span>
                        </button>
                    </form>
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="100%" class="italic text-center">No users could be found.</x-table.cell>
            </x-table.row>
        @endforelse
    </x-table.body>
</x-table>

{{-- Pagination --}}
<div class="mt-8" hx-boost="true" hx-target="#user-table-container">
    {{ $users->links() }}
</div>
