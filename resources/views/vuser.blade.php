<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = 'c_user' method = 'post' enctype = 'multipart/form-data'>
        <input type = 'text' name = 'username'  value = '' placeholder = 'Username'> <p />
        @csrf
        <input type = 'password' name ='password' value = '' placeholder = 'Password'> <p />
        <input type = 'hidden' name ='admin' value = '{{$username}}' placeholder = 'Admin'> <p />
        <input type = 'file' name ='image' value = '' placeholder = ''> <p />
        <p />
        <input type = 'submit' name = 'submit' value = 'Submit'> 
    </form>
</body>
</html>