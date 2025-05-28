@extends('layouts.app')

@section('title', 'Compras - Cardfort')

@section('content')
<div class="container-fluid">
    <h1 style="margin-top: 70px;" class="text-center">Compras</h1>

    <!-- Formulário de Filtros -->
    <form method="GET" action="{{ route('compras') }}">
        @csrf
        <div class="accordion" id="accordionExample">
            <div class="card" style="background: transparent; border: none;">
                <div class="card-header" id="headingTwo" style="background: transparent; border: none; padding-bottom: 0px;">
                    <h5 class="mb-0">
                        <button style="font-size: 28px;" class="btn btn-dark btn-block" type="button" 
                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false">
                            Filtros de busca
                        </button>
                    </h5>
                </div>
                
                <div id="collapseTwo" class="collapse">
                    <div class="card-body" style="margin-left: 7px; margin-right: 7px;">
                        <div style="justify-content: space-around; display: flex;">
                            <!-- Filtro Preço -->
                            <select class="bfiltro" name="preco">
                                <option value="!= 0">Todos os preços</option>
                                <option value="<= 500">Até R$ 500,00</option>
                                <option value=">= 500 and preco <=1000">R$ 500,00 a R$ 1000,00</option>
                                <option value=">= 1000 and preco <=2000">R$ 1000,00 a R$ 2000,00</option>
                                <option value=">= 2000">Mais de R$ 2000,00</option>
                            </select>

                            <!-- Filtro Categoria -->
                            <select class="bfiltro" name="categoria">
                                <option value="!= 0">Todas as categorias</option>
                                <option value="= 1">Gamer</option>
                                <option value="= 2">Escritório</option>
                                <option value="= 3">Decorativas</option>
                                <option value="= 4">Para sala</option>
                                <option value="= 5">Jantar</option>
                            </select>

                            <!-- Filtro Material -->
                            <select class="bfiltro" name="material">
                                <option value="!= 0">Todos os materiais</option>
                                <option value="= 1">Couro</option>
                                <option value="= 2">Madeira</option>
                                <option value="= 3">Ferro</option>
                                <option value="= 4">Plástico</option>
                                <option value="= 5">Acrílico</option>
                            </select>
                        </div>
                        
                        <div style="width: 100%; margin-top: 8px;">
                            <button style="font-size: 28px; width: 100%" type="submit" name="filtrar" class="btn btn-primary">
                                Filtrar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Lista de Produtos -->
    <div class="row" style="margin: 20px 67px;">
        @forelse($cadeiras as $cadeira)
            <div class="col-sm" style="margin-left: 15px; margin-bottom: 20px;">
                <a class="a" title="Adicionar no carrinho" href="#">
                    <div class="card" style="width: 300px; min-height: 400px; background-color: white; 
                         border-top-color: transparent; border-bottom-color: transparent; 
                         border-left-color: rgba(0,0,0,0.3); border-right-color: rgba(0,0,0,0.3);">
                        
                        <div class="text-center">
                            <img src="{{ $cadeira->img_url }}" class="card-img-top" alt="Erro ao carregar a imagem">
                        </div>

                        <div class="card-body">
                            <h4 class="card-title" style="color: #666666; font-size: 22px;">
                                {{ $cadeira->nome_resumo }}
                            </h4>
                            <div style="position: absolute; bottom: 25px;">
                                <p class="card-text" style="color: #333333; font-size: 20px;">
                                    {{ $cadeira->preco_formatado }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p>Nenhum produto encontrado.</p>
            </div>
        @endforelse
    </div>
</div>

@push('styles')
<style>
    .bfiltro {
        font-size: 23px;
        padding: 5px 130px;
        cursor: pointer;
        border: 1px solid black;
        background: none;
        outline: none;
        position: relative;
        background-color: rgba(110, 123, 139);
    }

    .card-img-top {
        border-top-left-radius: calc(.25rem - 1px);
        border-top-right-radius: calc(.25rem - 1px);
        max-width: 280px;
        width: 100px;
        max-height: 230px;
        min-height: 230px;
        height: auto;
        width: auto;
    }

    .a {
        text-decoration: none;
        color: black;
    }

    .a:hover {
        text-decoration: none;
    }
</style>
@endpush
@endsection