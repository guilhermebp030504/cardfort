@extends('layouts.app')

@section('title', 'Tela Principal - Cardfort')

@push('styles')
<style>
main#principal {
    background: url({{ asset('img/prin.jpg') }}) no-repeat center center;
    background-size: cover; 
    height: 100vh;
}
</style>
@endpush

@section('modals')
    @include('components.modal-perfil')
    @include('components.modal-video')
@endsection

@section('content')
    <br><br><br><br>
    
    {{-- Carrossel Principal --}}
    @include('components.carousel')
    
    
    {{-- Seção de Categorias --}}
    @include('components.categories')
    
@endsection


