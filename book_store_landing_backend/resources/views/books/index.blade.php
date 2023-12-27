@php
    use Illuminate\Support\Facades\Session;
@endphp

@extends('books.layout')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">author</th>
            <th scope="col">description</th>
            <th scope="col">image</th>
            <th scope="col">genre</th>
        </tr>
        </thead>
        <tbody>

        @foreach($books as $book)
            <tr>
                <th>{{$book->title}}</th>
                <th>{{$book->author}}</th>
                <th>{{$book->description}}</th>
                <th><img src="{{ asset($book->cover_image) }}" class="img-thumbnail"></th>
                <th>{{$book->genre->name}}</th>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection

@section('reviews')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">user name</th>
            <th scope="col">review_text</th>
            <th scope="col">user_photo</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reviews as $review)
            <tr>
                <th>{{$review->user_name}}</th>
                <th>{{$review->review_text}}</th>
                <th><img src="{{ asset($review->user_photo) }}" class="img-thumbnail"></th>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

@section('form')
    <form method="post" action="{{ route('subscribers.store') }}">
        <h3>Выберите что вы хотите получать в вашей персональной email-рассылке:</h3>
        <div class="checkbox">
            <label><input type="checkbox" value="">Информация о новых поступлениях</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Подборка по вашим избранным жанрам</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Статьи с рекомендациями от наших редакторов</label>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" value="">Уведомления о скидках</label>
        </div>

        <h3>Как часто вы бы хотели получать рассылку?</h3>
        <div class="radio">
            <label><input type="radio" name="optradio">Каждый день</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="optradio">Каждую неделю</label>
        </div>
        <div class="radio">
            <label><input type="radio" name="optradio">Каждый месяц</label>
        </div>

        <h3>Если есть вопрос, задайте его здесь:</h3>
        <div class="form-group">
            <textarea class="form-control" rows="5" id="comment"></textarea>
        </div>

        <h3>Оставьте свою электронную почту и мы свяжемся с вами!</h3>
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="usr" value="example@mail.com">
        </div>

        <div class="form-group row mt-3">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif
    </form>
@endsection
