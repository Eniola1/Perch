<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login form</h1>

    <form  action = "verify" method = "post">
    <input type = "text" name = "name"  value = "" placeholder = "Username"> <p />
    @csrf
    <input type = "password" name = "password" value = "" placeholder = "Password"> <p />
    <p />
    <input type = 'submit' name = 'submit' value = 'Submit'> 
    </form>
    
</body>
</html>