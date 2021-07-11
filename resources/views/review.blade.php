@extends('layout')

@section('title')Отзывы@endsection

@section('main_content')
    <h1>Добавить отзыв</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $key => $error)
                    <li>
                        {{$error}}<br>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="review/check">
        @csrf
        <input type="email" name="email" id="email" placeholder="Ведите email" class="form-control"><br>
        <input type="text" name="subject" id="subject" placeholder="Ведите отзыв" class="form-control"><br>
        <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea><br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
    <br>
    <h1>Все отзывы</h1>
    @foreach($reviews as $el)
        <div class="alert alert-warning">
            <h3>Тема: {{$el->subject}}</h3>
            <b>Email: {{$el->email}}</b>
            <p>Отзыв: {{$el->message}}</p>
        </div>
    @endforeach
@endsection
