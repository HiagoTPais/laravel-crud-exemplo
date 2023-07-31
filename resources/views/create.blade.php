@extends('adminlte::page')

@section('title', 'Crud')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

            <div class="p-6 bg-white border-b border-gray-200">
                <h3>Novo Contato</h3>
                <form action="{{ url('store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" required name="name" class="form-control" placeholder="Antônio Teixeira">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" required name="email" class="form-control" placeholder="antonio@gmail.com">
                    </div>
                    <div class="form-group">
                        <label>Telefone</label>
                        <input type="tel" maxlength="15" onkeyup="handlePhone(event)" required name="phone" class="form-control" placeholder="(77) 99945-7842">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/dashboard" class="btn btn-secondary">Retornar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@stop

@section('js')
<script src="{{ asset('/js/script.js') }}"></script>
@stop