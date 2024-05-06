<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index() {

        $search = request('search');

        if($search) {

            $events = Event::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else{
            $events = Event::all(); //ou seja, vai chamar todos os eventos do BD;
        }

    return view('welcome', compact('events', 'search'));
    }

    public function create() {
        return view('events/create');
    }

    public function store(Request $request){

        //cria uma variavel instaciando o Model Event
        $event = new Event;

        //preenchendo todos os dados que são obrigatorios no banco de dados
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->private = $request->private;
        $event->description = $request->description;
        $event->items = $request->items; //esse dado tem que vim como ARRAY e não como string, então tenho que alterar o Model !

        //image upload:
        if($request->hasFile('image') && $request->file('image')->isValid()){

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            //pega o nome do arquivo, acessa a propriedade image e o método  getClientOriginalName e vai concatenar com o tempo de agora; vai criar uma string unica baseada com o tempo que está dando upload; O MD5 faz uma hash(deixa o nome único); depois concatena com a extensão do arquivo
            $imageName = md5($requestImage->getClientOriginalName().strtotime("now")). "." .$extension;

            //adicionando a img a pasta: salva a img nesse path, com esse nome
            $requestImage->move(public_path('img/events'), $imageName);

            //alterar do obj a propriedade img para o nome da imagem
            $event->image = $imageName;

            //se tentar adicionar a img vai dar erro!! tenho que adicionar na migration no banco de dados porque ainda não tem o campo de img na tabela !
        }

        $user = auth()->user(); //usuario logado
        $event->user_id = $user->id; //acessando a propriedade ID do usuário logado

        //salvar os dados no banco;
        $event->save();
        //depois redireciona o usuário para alguma página;

        return redirect('/')->with('msg', 'Evento criado com sucesso!');

    }

    public function show($id){
        $event = Event::findOrFail($id); //achar o id no BD

        $eventOwner = User::where('id', $event->user_id)->first()->toArray();

        return view('.events.show', compact('event', 'eventOwner'));
    }
}
