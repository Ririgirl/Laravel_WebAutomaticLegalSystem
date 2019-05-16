@extends('layouts.app')
<link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
	<div class="container">
		<div class="row book justify-content-center">
			<div class="card border-light mb-3" style="max-width: 44rem;">
			  <div class="card-body">
			  	 <form action = "{{ action('HomeController@updatetasksave', $task->id ) }}" method = "post">
            {{ csrf_field() }}
            <input type="hidden" name='_method' value='post'/>
			  	<div class="row">
			  		<div class="col-md-6"><p class="card-text"><strong>Дата:</strong> {{ $task->created_at }} </a></p></div>
			  		<div class="col-md-6"><p class="card-text"><strong>Дело №:</strong> <a href="#" style="text-decoration:none;">{{ $task->reg_number }}</a></p></div>
			  		<div class="col-md-3"><br><p><strong>Название: </strong></p></div>
            <div class="col-md-9"><br><input type="text" class="form-control" value='{{ $task->name }}' name = 'name' required></div>
						<div class="col-md-3"><br><p><strong>Статус: </strong></p></div>
            <div class="col-md-9">
            	<div class="form-group">
						    <select class="form-control" id="exampleFormControlSelect1" name="status">
						      <option value="В работе">В работе</option>
				    			<option value="Выполнено">Выполнено</option>
						    </select>
						  </div>
			  	</div>
			  	<div class="col-md-3"><br><p><strong>Описание: </strong></p></div>
          <div class="col-md-9"><br><textarea type="text" class="form-control" rows='10' name = 'description' required>{{ $task->description }}</textarea></div>
			    </div><br>
			    	<input class="btn btn btn-outline-dark float-right" value='Сохранить' type='submit'>
			 		</div>
			 		</form>
			  </div>
			</div>
		</div>
	</div>
@endsection('content')
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>