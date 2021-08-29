<!DOCTYPE html>
<html>
<head>
</head>
<body>
<div id="overlay">
        <div class="popup">
            <button class="close" title="Закрыть окно" onclick="swa2()"></button>
            <p class="zag">Задача</p>
    <form action="{{ route('createTask') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>
            <div class="col-md-6">
                <input type="text" id="title" class="form-control" name="title" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Описание</label>
            <div class="col-md-6">
                <input type="text" id="description" class="form-control" name="description" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="endDate" class="col-md-4 col-form-label text-md-right">Дата окончания</label>
            <div class="col-md-6">
            <input type="text" required  id="datepicker" value="" name="date">  
            </div>
        </div>

        <div class="form-group row">
            <label for="priority" class="col-md-4 col-form-label text-md-right">Приоритет</label>
            <div class="col-md-6">
                <select name="priority">
                    <option value="low">Низкий</option>
                    <option value="mid">Средний</option>
                    <option value="high">Высокий</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-md-4 col-form-label text-md-right">Статус</label>
            <div class="col-md-6">
                <select name="status">
                        <option value="notStart">Работа не начата</option>
                        <option value="start">Выполняется</option>
                        <option value="end">Выполнена</option>
                        <option value="cancel">Отменена</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="respUser" class="col-md-4 col-form-label text-md-right">Ответственный</label>
            <div class="col-md-6">
                <select name="respUser">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->lastName}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" style="margin-top:20px;">
                Создать задачу
            </button>
        </div>
    </form>
        </div>
        </div>
        <button style="position: absolute; left:1750px; top: 25px;" onclick="swa()" type="button">Создать задачу</button>

        <div class="container">
            @foreach($tasks as $task)
                @if($task->endDate < date("Y-m-d"))
                    <div class="tasks" style="background-color: f02b2b;">
                @elseif($task->status == "end")
                    <div class="tasks" style="background-color: 55d461;">
                @else
                    <div class="tasks" style="background-color: ccc;">
                @endif
                    <div id="title" style="text-align: center;border-bottom: 1px solid black;">
                      <a onClick="swa3()" name="{{ $user->id }}">  {{ $task->title }} </a>
                    </div>
                    <div class="taskItem">Приоритет: {{ $task->priority }}</div>
                    <div class="taskItem">Дата окончания: {{ $task->endDate }}</div>
                    <div class="taskItem">Ответственный: {{ $task->user->lastName }}</div>
            </div>
            @endforeach
        </div>
        <div id="overlay2">
            <div class="popup2">
                <button class="close2" title="Закрыть окно" onclick="swa4()"></button>
                <p class="zag2">Задача</p>
                <form action="{{ route('createTask') }}" method="POST">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">Заголовок</label>
            <div class="col-md-6">
                <input type="text" id="title" class="form-control" name="title" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Описание</label>
            <div class="col-md-6">
                <input type="text" id="description" class="form-control" name="description" required />
            </div>
        </div>

        <div class="form-group row">
            <label for="endDate" class="col-md-4 col-form-label text-md-right">Дата окончания</label>
            <div class="col-md-6">
            <input type="text" required  id="datepicker" value="" name="date">  
            </div>
        </div>

        <div class="form-group row">
            <label for="priority" class="col-md-4 col-form-label text-md-right">Приоритет</label>
            <div class="col-md-6">
                <select name="priority">
                    <option value="low">Низкий</option>
                    <option value="mid">Средний</option>
                    <option value="high">Высокий</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="status" class="col-md-4 col-form-label text-md-right">Статус</label>
            <div class="col-md-6">
                <select name="status">
                        <option value="notStart">Работа не начата</option>
                        <option value="start">Выполняется</option>
                        <option value="end">Выполнена</option>
                        <option value="cancel">Отменена</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="respUser" class="col-md-4 col-form-label text-md-right">Ответственный</label>
            <div class="col-md-6">
                <select name="respUser">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->lastName}}</option>
                @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary" disabled style="margin-top:20px;">
                Обновить задачу
            </button>
            </div>
    </form>
            </div>
        </div>
            
        <script>
            var b = document.getElementById('overlay');
            function swa(){
                b.style.visibility = 'visible';
                b.style.opacity = '1';
                b.style.transition = 'all 0.7s ease-out 0s';
            }
            function swa2(){
                b.style.visibility = 'hidden';
                b.style.opacity = '0';
            }
            var d = document.getElementById('overlay2');
            function swa3(){
                d.style.visibility = 'visible';
                d.style.opacity = '1';
                d.style.transition = 'all 0.7s ease-out 0s';
            }
            function swa4(){
                d.style.visibility = 'hidden';
                d.style.opacity = '0';
            }
        </script>
</body>
</html>