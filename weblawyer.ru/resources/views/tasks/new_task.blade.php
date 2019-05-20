@extends('layouts.app')
<!-- Styles -->
    <link rel="stylesheet" href="{{ URL::asset('css/menu/style.css') }}" type="text/css">
@section('content')
<div class="container">
    <div class="container task_last">
        <form action = "{{ action('HomeController@savenewtask') }}" method = "post">
            {{ csrf_field() }}
            <div class="row">
            <input type="hidden" name='_method' value='post'/>
                    <div class="col-md-3"><br><p style="margin-left:50%; color: #8d8d8d;"><strong>Дело №:</strong></p></div>
                    <div class="col-md-9"><br>
                        <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="delo">
                                @FOREACH ($acts as $act)
                                <option value="{{ $act->reg_number }}">{{ $act->reg_number}} | {{ $act->type }}</option>
                                @endFOREACH
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3"><br><p style="margin-left:50%; color: #8d8d8d;"><strong>Название: </strong></p></div>
                    <div class="col-md-9"><br><input type="text" class="form-control" name = 'name' required></div>
                    <div class="col-md-3"><br><p style="margin-left:50%; color: #8d8d8d;"><strong>Статус: </strong></p></div>
                    <div class="col-md-9"><br>
                        <div class="form-group">
                                <select class="form-control" id="exampleFormControlSelect1" name="status">
                                    <option value="В работе">В работе</option>
                                    <option value="Выполнено">Выполнено</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-md-3"><br><p style="margin-left:50%; color: #8d8d8d;"><strong>Описание: </strong></p></div>
                    <div class="col-md-9"><br><textarea type="text" class="form-control" rows='10' name = 'description' required></textarea><br><br></div>
            <div class="col-md-9"></div>
            <div class="col-md-3">
            <input class="btn btn btn-outline-dark float-right" value='Сохранить' type='submit'><br><br></div>
        </div>
    </form>
    </div>
</div>
@endsection('content')

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
