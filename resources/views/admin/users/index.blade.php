@extends('admin.layouts.app')

@section('title', 'Users Management')

@section('content')
<div class="px-6 py-6 font-sans">
    <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-gray-100">
        <div>
            <h1 class="text-2xl font-black text-gray-900 tracking-tight">Users Management</h1>
            <p class="text-sm text-gray-400">Team and client account management</p>
        </div>
        <button class="bg-primary text-white px-6 py-2 rounded-lg font-black tracking-normal flex items-center gap-2 hover:bg-primary/90 transition-all">
            <span class="material-icons">person_add</span>
            Add User
        </button>
    </div>
    
    <x-admin.table :headers="['User Details', 'Role', 'Status', 'Joined']" :items="collect([])">
        <!-- Reusable empty state is handled by component -->
    </x-admin.table>
</div>
@endsection
