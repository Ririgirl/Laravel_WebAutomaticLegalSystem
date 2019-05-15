@extends('layouts.app')
<!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
    <style>
        .card-body > p {
  font-size: 10px;
  color: #8d8d8d;
  width: 100%;
}
    </style>
@section('content')
<div class="container">
    <div class="container search">
        <form action="" class="search_form">
            <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Поиск по названиям задач" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <button class="btn btn btn-outline-dark" type="button" id="button-addon2">Поиск <i class="fa fa-search" aria-hidden="true"></i></button>
              </div>
            </div>
        </form>
    </div><br/>
    <div class="container task_last">
        <div class="row book justify-content-center">
            @FOREACH ($tasks as $task)
            <div class="card border-light mb-3" style="max-width: 14rem;">
              <div class="card-body">
                <h5 class="card-title"><a href="">{{ $task->name }}</a></h5>
                <p class="card-text"><strong>Статус:</strong> {{ $task->status }}</p>
                <p class="card-text"><strong>Дата создания:</strong> {{ $task->created_at }}</p>
                <p class="card-text">{{ str_limit($task->description, $limit = 100, $end = '...') }}</p>
                <p class="card-text"><a href="#">Изменить <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p> 
              </div>
            </div>
          @endFOREACH
        </div>
    </div>
</div>
@endsection('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
