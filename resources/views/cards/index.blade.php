<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h4>List of cards</h4>

<table style="width: 100%" class="table">
    @php
        $columns = ['id','title','imagen','description','active',];
    @endphp
    <thead>
    <tr>
        @foreach($columns as $column)
            <th style="text-transform: capitalize">{{$column}}</th>
        @endforeach
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cards as $card)
        <tr>
            @foreach($columns as $column)
                <td>{{$card[$column]}}</td>
            @endforeach
            <td>
                <a href="{{route('cards.show', ['card'=>$card->id])}}">Ver</a>
                <a href="{{route('cards.edit', ['card'=>$card->id])}}">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
</body>
</html>