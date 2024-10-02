@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$product->name_product}}</div>
                    <img src="/{{ $product->path_product }}" class="d-block w-100" alt="{{$product->name_product}}">
                    <h4>Id категории: {{$product->id_category}}</h4>
                    <h4>Страна: {{$product->country_product}}</h4>
                    <h4>Год производства: {{$product->year_product}}</h4>
                    <h4> Модель: {{$product->model_product}}</h4>

                    <h1 style="text-align: right">Цена: {{$product->price_product}}р.</h1>

                </div>
            </div>
        </div>
    </div>
@endsection
