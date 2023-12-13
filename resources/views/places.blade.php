
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><body>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Price From</th>
                <th>To</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($places as $place)
                <tr>
                    <td>{{$place->imageTitle}}</td>
                    <td>{{$place->from}}</td>
                    <td>{{$place->to}}</td>
                    <td>{{$place->created_at}}</td>
                    <td><a href="editPlace/{{$place->id}}"><i class="fa fa-edit"></i></a></td>
                    <td><a href="deletePlace/{{$place->id}}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


