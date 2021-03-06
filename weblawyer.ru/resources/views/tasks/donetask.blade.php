@extends('layouts.app')
    <link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
<div class="container">
    <div class="container search">
        <form action="{{ action('HomeController@search') }}" class="search_form">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Поиск по названиям задач" aria-label="Recipient's username" aria-describedby="button-addon2">
              <div class="input-group-append">
                <input class="btn btn btn-outline-dark" type="submit" value="Поиск" style="height:38px">
              </div>
            </div>
        </form>
    </div><br/>
    <div class="container task_last">
        <div class="row book justify-content-center">
            <div class="container">
            <div class="row">
                <div class="col-md-6"><p class="float-right"><a href="{{ action('HomeController@index') }}" >В разработке</a></p></div>
                <div class="col-md-6"><p class="float-left"><a href="#" class="disabled">Реализованные</a></p></div>
            </div></div>
            @FOREACH ($tasksdone as $taskdone)
            <div class="card border-light mb-3" style="max-width: 14rem;">
              <div class="card-body">
                <h5 class="card-title"><a href="/home/task/{{ $taskdone->id }}">{{ $taskdone->name }}</a></h5>
                <p class="card-text"><strong>Статус:</strong> {{ $taskdone->status }}</p>
                <p class="card-text"><strong>Дата создания:</strong><br> {{ $taskdone->created_at }}</p>
                <p class="card-text">{{ str_limit($taskdone->description, $limit = 100, $end = '...') }}</p>
                <p class="card-text float-right"><a href="{{ action('HomeController@updatetask', $taskdone->id) }}">Изменить <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p> 
              </div>
            </div>
          @endFOREACH
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                @if($tasksdone->currentPage() == 1)
                    <li class="page-item disabled">
                        <a class="page-link" href="{{ $tasksdone->previousPageUrl() }}" tabindex="-1">Предидущая</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $tasksdone->previousPageUrl() }}" tabindex="-1">Предидущая</a>
                    </li>
                @endif

                <li class="page-item"><a class="page-link" href="{{ $tasksdone->url(1) }}">1</a></li>
                <li class="page-item disabled"><p class="page-link">Вы на странице {{$tasksdone->currentPage()}}</p></li>
                <li class="page-item"><a class="page-link" href="{{ '/task_done?page='.$tasksdone->lastPage() }}">{{ $tasksdone->lastPage() }}</a></li>

                @if($tasksdone->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $tasksdone->nextPageUrl() }}">Следующая</a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link" href="{{ $tasksdone->nextPageUrl() }}">Следующая</a>
                @endif

                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>