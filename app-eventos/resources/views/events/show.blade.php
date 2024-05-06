@extends('layout.fe')

@section('title')
<title>titulo</title>
@endsection

@section('content')

{{--criar uma div principal para ter todo o conteudo do evento --}}
{{--essa primeira div para centralizar no meio da página --}}


<div class="col-md-10 offset-md-1 mt-4">
    <div class="row">
        <div id="image-container" class="col-md-6">
            <img src="/img/events/{{$event->image}}" class="img-fluid" alt="{{$event->title}}">
        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$event->title}}</h1>
            <p class="event-city">
                <i class="bi bi-geo-alt"></i>
                {{$event->city}}
            </p>
            <p class="events-participants">
                <i class="bi bi-people-fill"></i>
                    x-participantes
            </p>
            <p class="event-owner">
                <i class="bi bi-person-fill"></i>
                {{$eventOwner['name']}}
            </p>
            <a href="#" class="btn btn-primary" id="event-submit">Confirmar presença</a>
            <h3>O evento conta com: </h3>
            <ul id="items-list">
                @foreach ($event->items as $item)
                    <li><i class="bi bi-check-circle"></i>{{$item}}</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-12" id="description-container">
            <h3>Sobre o evento: </h3>
           <p class="event-description"> {{$event->description}}</p>
        </div>
    </div>
</div>

@endsection
