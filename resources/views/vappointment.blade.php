<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All appointments</h1>

    <table>

        <tr>
            <th>User</th>
            <th>Service</th>
            <th>Image</th>
            <th>price</th>
        </tr>

        @foreach($apps as $app)
            <tr>
                <td>
                    <img src="images/{{$app->images}}" alt="" srcset="" width = "50" height = "50">{{$app->username;}}
                </td>

                <td>
                    {{$app->name;}}
                </td>

                <td>
                    <img src="images/{{$app->image}}" width = "100" height = "100" alt="" srcset="">
                </td>

                <td>
                    {{$app->price;}}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>