@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">ВСЕ Товары</div>



                    <div class="card-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach($products as $product)
                                    @if($loop->index == 0)
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    @else
                                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}" aria-label="Slide {{ $loop->index }}"></button>
                                    @endif
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach($products as $product)

                                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                                        <h2 style="text-align: center">{{$product->name_product}}</h2>
                                        <h6>Id категории: {{$product->id_category}}</h6>
                                        <h6>Страна: {{$product->country_product}} | Год производства: {{$product->year_product}} | Модель: {{$product->model_product}}</h6>
                                        <h6>Цена: {{$product->price_product}}р.</h6>
                                        <a href="{{route('product', ['id' => $product->id_product])}}">
                                        <img src="{{ $product->path_product }}" class="d-block w-100" alt="{{$product->name_product}}">
                                        </a>
                                    </div>

                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
