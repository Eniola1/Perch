<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = 'c_service' method = 'post' enctype = 'multipart/form-data'>
    <input type = 'text' name = 'service'  value = '' placeholder = 'Service name'> <p />
    @csrf
    <input type = 'file' name = 'image' required='true'/><p />
    <input type = 'hidden' name ='admin' value = '{{$username}}' placeholder = 'Admin'> <p />
    <input type = 'text' name = 'price' value = '' placeholder = 'Price'> <p />
    <p />
    <input type = 'submit' name = 'submit' value = 'Submit'> 
    </form>
</body>
</html>