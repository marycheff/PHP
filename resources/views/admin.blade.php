@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Админ панель</div>
                    <div class="card-body">
                        <h2>Категории</h2>
                        <form action="{{ route('addCategory') }}" method="post" class="row g-3">
                            @csrf
                            <div class="col-12">
                                <label for="name_category" class="form-label">Название категории</label>
                                <input type="text" class="form-control" id="name_category" name="name_category" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                        <br>
                        <form action="{{ route('delCategory') }}" method="post" class="row g-3">
                            @csrf
                            @method('DELETE')
                            <div class="col-md-4">
                                <label for="id_category" class="form-label">Выберите категорию</label>
                                <select id="id_category" class="form-select" name="id_category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </div>
                        </form>

                        <div>{{ session('msgForCategory') }}</div>
                        <br>
                        <h2>Добавить товар</h2>
                        <form action="{{ route('addProduct') }}" method="post" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="name_product" class="form-label">Название</label>
                                <input type="text" class="form-control" id="name_product" name="name_product" required>
                            </div>
                            <div class="col-12">
                                <label for="price_product" class="form-label">Цена</label>
                                <input type="number" class="form-control" id="price_product" name="price_product" required>
                            </div>
                            <div class="col-12">
                                <label for="country_product" class="form-label">Страна</label>
                                <input type="text" class="form-control" id="country_product" name="country_product" required>
                            </div>
                            <div class="col-12">
                                <label for="year_product" class="form-label">Год производства</label>
                                <input type="number" class="form-control" id="year_product" name="year_product" required>
                            </div>
                            <div class="col-12">
                                <label for="model_product" class="form-label">Модель</label>
                                <input type="text" class="form-control" id="model_product" name="model_product" required>
                            </div>
                            <div class="col-md-4">
                                <label for="id_category" class="form-label">Выберите категорию</label>
                                <select id="id_category" class="form-select" name="id_category" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id_category }}">{{ $category->name_category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="count_product" class="form-label">Количество</label>
                                <input type="number" class="form-control" id="count_product" name="count_product" required>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Выберите фото для товара</label>
                                <input class="form-control" type="file" id="image" accept="image/*" name="image" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Добавить</button>
                            </div>
                        </form>
                        <div>{{ session('msgForProduct') }}</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
