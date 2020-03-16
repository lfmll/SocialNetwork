@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-8 mx-auto">
            <form action="{{ route('statuses.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <textarea class="form-control border-0" name="body" placeholder="¿Qué Pasa?"></textarea>    
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="create-status">Publicar</button>        
                </div>                
            </form>
        </div>
    </div>            
</div>            
    
@endsection
