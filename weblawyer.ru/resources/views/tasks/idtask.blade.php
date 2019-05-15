@extends('layouts.app')
    <link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
	<div class="container">
		<div class="row book justify-content-center">
			<div class="card border-light mb-3" style="max-width: 44rem;">
			  <div class="card-body">
			    <h5 class="card-title">{{ $task->name }}</h5>
			    <p class="card-text"><strong>Дата:</strong> {{ $task->created_at }} | <strong>Дело №:</strong> <a href="#">{{ $task->reg_number }}</a> | <strong>Статус:</strong> {{ $task->status }}</p>
			    <p class="card-text"></p>
			    <p class="card-text" style="font-size:100%;">{{ $task->description }}</p>
			    <p class="card-text float-right"><a href="#">Изменить <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></p> 
			  </div>
			</div>
		</div>
	</div>
@endsection('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>