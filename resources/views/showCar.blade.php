<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr><td>car title: {{$car->carTitle}}</td></tr>        
        <tr><td>description: {{$car->description}}</td></tr>
        <tr><td>published: {{$car->published}}</td></tr>
        <tr><td>Category: {{$car->category->categoryName}}</td></tr>
    </table>
</body>
</html>


