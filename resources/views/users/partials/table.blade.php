<x-table hx-target="#user-table-container" :$defaultSortField :$defaultSortDir>
    <x-table.head>
        <x-table.row>
            <x-table.heading sortable field="id">ID</x-table.heading>
            <x-table.heading sortable field="name">Name</x-table.heading>
            <x-table.heading sortable field="email">Email</x-table.heading>
        </x-table.row>
    </x-table.head>
    <x-table.body>
        @foreach ($users as $user)
            <x-table.row class="even:bg-gray-50">
                <x-table.cell class="tabular-numbers">{{ $user->id }}</x-table.cell>
                <x-table.cell>{{ $user->name }}</x-table.cell>
                <x-table.cell>{{ $user->email }}</x-table.cell>
            </x-table.row>
        @endforeach
    </x-table.body>
</x-table>
