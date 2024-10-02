<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{

    public function index() {
        $products = DB::table('products')
            ->where('count_product', '>', 0)
            ->orderByDesc('id_product') // сортировка по убыванию
            ->limit(5) // вернуть только 5 последних записей
            ->get(); // или написать на SQL: DB::select("SELECT * FROM `products` WHERE count_product > 0 ORDER BY id_product DESC LIMIT 5")

        return view('index', [
            'products' => $products
        ]); // главная страница вернется и в нее передаем переменную $products с записями из БД
    }


    public function products() {
        return view('products'); // товары страница
    }

    public function product($id) {
        return view('product'); // товар страница
    }

    public function admin() {
        // если у авторизированного пользователя нет прав, то переадресовываем его на главную страницу
        if (auth()->user() && auth()->user()->isAdmin()) {
            $categories = DB::table('categories')->get(); // получаем все записи из таблицы categories или так DB::select("SELECT * FROM categories;")

            return view('admin', [ // передаем в шаблон переменную $categories
                'categories' => $categories
            ]); // админ страница, где можно будет добавлять/удалять категории и добавлять товары
        };

        return redirect(route('index'));
    }






    public function addCategory(Request $request) {
        // проверку на админа можете сюда добавить, как в методе admin

        $data = $request->all(); // получаем все данные с полей

        // обращаемся к таблице и добавляем новую запись
        //DB класс нужно удалить и снова написать, тогда вам PhpStorm предложит подключить, выбираем Illuminate\Support\Facades
        DB::table('categories')->insert([
            'name_category' => $data['name_category']
        ]);
        // или можно по другому DB::insert("INSERT INTO `categories` (`name_category`) VALUES (?)", [$data['name_category']]);

        // переадресовываем на предыдущую страницу и отправляем сообщение
        return redirect(url()->previous())
            ->with(['msgForCategory' => 'Категория добавлена']);
    }

    public function delCategory(Request $request) {
        // проверку на админа можете сюда добавить, как в методе admin

        $id_category = $request->id_category; // получаем данные с формы

        $checkProduct = DB::table('products') // пример проверки, если нужно проверить, что категория не используется в товаре
        ->where('id_category', $id_category) // ищем в столбце id_category переданный ID с формы
        ->first(); // вернет ассоциативный массив
        if ($checkProduct) { // если нашли такой товар, то редиректим пользователя на прошлую страницу
            return redirect(url()->previous())
                ->with(['msgForCategory' => 'Категория уже используется в товаре с id - ' . $checkProduct->id_product]);
        }

        DB::table('categories') // удаляем категорию
        ->where('id_category', $id_category)
            ->delete(); // метод для удаления записи или записей, смотря какое условие было написано до

        return redirect(url()->previous())
            ->with(['msgForCategory' => 'Категория удалена']);
    }


    public function addProduct(Request $request) {
        // проверку на админа можете сюда добавить, как в методе admin

        $img = $request->file('image'); // получили картинку
        $typeImg = $img->extension(); // взяли расширение

        // удаляем Str и снова пишем Str в подсказке выбираем Illuminate\Support
        $uniqName = Str::random(); // уникальное название для нашего файла в файловой системе
        $nameImg = $uniqName.'.'.$typeImg; // соединили название и расширение
        $pathFolder = 'assets/img/products/'; // указали куда будем сохранять файлы в public

        $img->move(public_path($pathFolder), $nameImg);// сохраняем картинку в public/assets/img/products

        DB::table('products')->insert([
            'id_category' => $request->id_category,
            'name_product' => $request->name_product,
            'price_product' => $request->price_product,
            'country_product' => $request->country_product,
            'year_product' => $request->year_product,
            'model_product' => $request->model_product,
            'count_product' => $request->count_product,
            'path_product' => $pathFolder . $nameImg
        ]);

        return redirect(url()->previous())
            ->with(['msgForProduct' => 'Товар успешно добавлен']);
    }













}


