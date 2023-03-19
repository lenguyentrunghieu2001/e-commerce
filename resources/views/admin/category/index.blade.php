@extends('layouts.admin')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin/categories/category.css') }}">
@endpush
@section('content')
    <div>
        <livewire:admin.category.index />
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('admin/categories/category.js') }}"></script>
@endpush
