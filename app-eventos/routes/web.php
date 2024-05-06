<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;


/*Event Controller */
Route::get('/', [EventController::class, 'index']);
//'criar' será o nome do método que vamos criar no controller para criar um evento
//vamos adicionar um novo parametro nas rotas para permitir criar o evento SÓ se o usuário estiver logado! Vamos adicionar um middleware (vai agir entre a ação de clicar no link e a view ser mostrada)
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth'); //ou seja, a rota só será acessada por usuarios logados
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post('/events', [EventController::class, 'store']);


Route::get('/contact', function () {
    return view('contacts');
});

Route::get('/produtos', function () {
    return view('produtos');
});

Route::get('produtos/{id}', function ($id) {
    return view('produto', ['id' => $id ]);
}); //essa rota espera um ID; para mandar esse ID para a view coloco dentro de um array e envio o nome do parâmetro e o valor do parametro que está sendo passado atraves do query parametro;




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
