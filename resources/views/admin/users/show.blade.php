@extends('admin.layouts.app')
@section('content')
    @component('admin.components.show')
        @slot('title', $user->name)
        @slot('form')
            @include('admin.users.form', ['show' => true])
        @endslot
        @slot('back')
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary float-right ml-1"><i class="fas fa-pen"></i> Editar</a>
            <a href="{{ route('users.index') }}" class="btn btn-dark float-right"><i class="fas fa-undo-alt"></i> Voltar</a>
        @endslot
    @endcomponent
@endsection


@push('scripts')
    <script>
        $('.form-control').attr('readonly',true);
    </script>
@endpush