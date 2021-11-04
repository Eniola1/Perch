<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($users as $user)
        <div>
            {{$user->name;}}<p />
            <img src="images/{{$user->image}}" width= "100" height = "100" alt="" srcset=""><p />
            ${{$id = $user->price;}}<p />
            <a href="{{url('/save')}}"><input type="button" value="Save" name = "save"></a><hr/>            
        </div>
    @endforeach
</body>
</html>