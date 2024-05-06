
@extends('layout.fe')

@section('content')

{{--colocando o formulário no centro da tela em 6 colunas--}}
<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1 class="mt-4">Crie o seu evento</h1>

    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf {{--Diretiva do laravel, tem que colocar para conseguir enviar o formulário para conseguir enviar dados ao BD --}}

        <div class="form-group">
            <label for="image">Imagem do evento:</label>
           <input type="file" id="image" name="image" class="form-control-file mb-3">
        </div>

        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
        </div>

        <div class="form-group">
            <label for="title">Data do Evento:</label>
            <input type="date" class="form-control" id="date" name="date" >
        </div>

        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do evento">
        </div>

        <div class="form-group">
            <label for="title">O evento é privado ? </label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>

            </select>
        </div>

        <div class="form-group">
            <label for="title">Descrição do Evento:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="title">Adicione itens de infraestrutura: </label>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Cerveja gratis"> Cerveja gratis
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Open food"> Open food
            </div>
            <div class="form-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes
            </div>
        </div>
        <input type="submit" class="btn btn-primary my-2" value="Criar Evento">
    </form>
</div>
@endsection
