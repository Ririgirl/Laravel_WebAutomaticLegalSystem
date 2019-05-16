@extends('layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
	 <div class="container search">
        <form action="{{ action('HomeController@search') }}" class="search_form" method = "get">
             {{ csrf_field() }}
            <input type="hidden" name='_method' value='get'/>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" name = "find_name" class="form-control" placeholder="Поиск по названиям задач" aria-label="Recipient's username" aria-describedby="button-addon2">
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
                <div class="col-md-12"><p>Данные по вашему запросу</p></div>
            </div></div>
            @FOREACH ($finds as $find)
            <div class="card border-light mb-3" style="max-width: 14rem;">
              <div class="card-body">
                <h5 class="card-title"><a href="/home/task/{{ $find->id }}">{{ $find->name }}</a></h5>
                <p class="card-text"><strong>Статус:</strong> {{ $find->status }}</p>
                <p class="card-text"><strong>Дата создания:</strong><br> {{ $find->created_at }}</p>
                <p class="card-text">{{ str_limit($find->description, $limit = 100, $end = '...') }}</p>
                <p class="card-text float-right"><a href="{{ action('HomeController@updatetask', $find->id) }}">Изменить <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p> 
              </div>
            </div>
          @endFOREACH
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                @if($finds->currentPage() == 1)
                    <li class="page-item disabled">
                        <a class="page-link" href="{{ $finds->previousPageUrl() }}" tabindex="-1">Предидущая</a>
                    </li>
                    @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $finds->previousPageUrl() }}" tabindex="-1">Предидущая</a>
                    </li>
                @endif

                <li class="page-item"><a class="page-link" href="{{ $finds->url(1) }}">1</a></li>
                <li class="page-item disabled"><p class="page-link">Вы на странице {{ $finds->currentPage()}}</p></li>
                <li class="page-item"><a class="page-link" href="{{ '/search?page='.$finds->lastPage() }}">{{ $finds->lastPage() }}</a></li>

                @if($finds->hasMorePages())
                        <li class="page-item"><a class="page-link" href="{{ $finds->nextPageUrl() }}">Следующая</a></li>
                    @else
                        <li class="page-item disabled"><a class="page-link" href="{{ $finds->nextPageUrl() }}">Следующая</a>
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