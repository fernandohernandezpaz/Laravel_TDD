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

<form action="{{route('cards.update', ['card'=>$card->id])}}" method="POST">
    @method('PUT')
    @csrf
    <h4>Detail of card to edit</h4>
    <fieldset>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{old('title', $card->title)}}">
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{old('description', $card->description)}}</textarea>
        <br>
        <input type="checkbox" id="active" name="active" value="true"
               @if(old('description', $card->description))
               checked
                @endif>
        <label for="active">Active</label><br>
        <button type="submit">Update</button>
    </fieldset>

</form>
</body>
</html>