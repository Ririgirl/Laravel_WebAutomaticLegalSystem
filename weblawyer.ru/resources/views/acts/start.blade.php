@extends('layouts.app')
	<link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
<div class="container">
    <div class="container search">
        <form action="{{ action('ActsController@search') }}" class="search_form" method = "get">
             {{ csrf_field() }}
            <input type="hidden" name='_method' value='get'/>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
                <input type="text" name = "find_num" class="form-control" placeholder="Поиск по номеру дела" aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <input class="btn btn btn-outline-dark" type="submit" value="Поиск" style="height:38px">
                </div>
            </div>
        </form>
    </div><br/>
    <div class="container task_last">
        <div class="row book justify-content-center">
            <div class="container">
	            <div class="container">
	            	<div class="row">
	            			<div class="col-md-4">
	            				<div class="col-md-12"><p>Типы дел</p></div>
	            				<div class="col-md-12">
	            					<div id="list-example" class="list-group">
	            						@FOREACH ($types_acts as $type_act)
			            					<a class="list-group-item list-group-item-action" href="{{ action('ActsController@seetypeacts', $type_act->type) }}">{{ $type_act->type}}</a>
	                    		@endFOREACH
	                    	</div>
											</div>
		            			
	            			</div>
		                <div class="col-md-8">
		                	<div class="row">
		                		<div class="col-md-12">
		                			<a class="btn btn btn-outline-dark float-right" href="{{ action('ActsController@newact') }}" role="button">Добавить новое дело</a><br/><br/>
		                		</div>
		                		<table class="table table-hover">
												  <thead>
												    <tr>
												      <th scope="col">#</th>
												      <th scope="col">№ Дела</th>
												      <th scope="col">Тип дела</th>
												      <th scope="col"></th>
												    </tr>
												  </thead>
												  <tbody>
		                					@FOREACH ($acts as $act) 
		                						<tr>
		                		 					<th scope="row">{{ $loop->iteration }} {{-- Starts with 1 --}}</th>
														      <td>{{ $act->reg_number }}</td>
														      <td>{{ $act->type}}</td>
														      <td><a class="btn btn btn-outline-info float-right" href="{{ action('ActsController@see_act', $act->reg_number ) }}" role="button">Посмотреть дело</a></td>
			            							</tr>
			            						@endFOREACH
												  </tbody>
												</table>
		                	</div>
		                </div>  
	            	</div>
	            </div>
          	</div><br/><br/>
           
        </div>
    </div>
</div>
@endsection('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
