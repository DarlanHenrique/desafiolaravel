@extends('admin.layouts.app')
@section('content')
    @component('admin.components.show')
        @slot('title', $category->name)
        @slot('form')
            @include('admin.categories.form')
        @endslot
        @slot('back')
            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('categories.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent
@endsection

@push('scripts')
    <script>
        $('.form-control').attr('readonly',true);
    </script>
@endpush