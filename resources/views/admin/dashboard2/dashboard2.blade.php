<x-app-layout>
    @include('layouts.navbar', [
        'name' => 'Dashboard 2',
        'link' => route('admin_dashboard_2'),
    ])

    @include('admin.dashboard2.modal.view_modal')
</x-app-layout>