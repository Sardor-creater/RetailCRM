<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">

        <h1>Создания заказа</h1>

        <form action="{{ route('contact-form') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name" class="form-label">ФИО</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Рихсибоев Сардор Бахром угли" />
            </div>
            <div class="form-group">
                <label for="komment">Комментарии</label>
                <input type="text" name="komment" id="komment" class="form-control" placeholder="...">
            </div>
            <div class="form-group">
                <label for="article">Артикул</label>
                <input type="text" name="article" id="article" class="form-control" placeholder="Например: AZ105W">
            </div>
            <div class="form-group">
                <label for="brand">Бренд</label>
                <input type="text" name="brand" id="brand" class="form-control" placeholder="Например: Azalita">
            </div>
            <button class="btn btn-success mt-2" type="submit">Создать</button>
        </form>
    </div>
    </body>
</html>
