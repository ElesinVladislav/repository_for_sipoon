<h1>Создание записи в блоге</h1>

<form action="/{{ __('roles') }}/" method="post">

    {{ csrf_field() }}

    <label>
        Заголовок:
        <input type="text" name="{{ __('title') }}">
    </label>

    <label>
        Содержимое:
        <textarea name="{{ __('content') }}"></textarea>
    </label>

    <input type="submit">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error}}</li>
            @endforeach
        </ul>
    </div>
@endif