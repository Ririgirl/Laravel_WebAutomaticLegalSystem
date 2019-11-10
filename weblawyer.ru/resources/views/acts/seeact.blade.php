@extends('layouts.app')
	<link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
	<nav>
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">О деле</a>
	    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Участники</a>
	    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Документы</a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
	  	<table class="table table-hover">
												  <thead>
												    <tr>
												      <th scope="col">№ Дела</th>
												      <th scope="col">Тип дела</th>
												    </tr>
												  </thead>
			 <tbody><tr>
														      <td>{{ $watch->reg_number }}</td>
														      <td>{{ $watch->type}}</td>		
														      </tr>				
				</tbody>
			</table>
			Задачи связанные с делом
			<table class="table table-hover">
												  <thead>
												    <tr>
												      <th scope="col">Название задачи</th>
												      <th scope="col">Статус</th>
												      <th scope="col"></th>
												    </tr>
												  </thead>
			 <tbody>
														      @FOREACH ($watch_tasks as $watch_task) 
		                						<tr>
		                		 					<th scope="row">{{ $loop->iteration }} {{-- Starts with 1 --}}</th>
														      <td>{{ $watch_task->name }}</td>
														      <td>{{ $watch_task->status}}</td>
														      <td><a class="btn btn btn-outline-info float-right" href="{{ action('HomeController@seetask', $watch_task->id ) }}" role="button">Посмотреть дело</a></td>
														      </tr>
			            						@endFOREACH
														      				
				</tbody>
			</table>
	  </div>
	  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
			
	  </div>
	  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

	  </div>
	</div>
@endsection('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
