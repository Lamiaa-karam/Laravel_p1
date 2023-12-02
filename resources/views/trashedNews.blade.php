<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><body>
    <h4>Trashed News List</h4>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Author</th>
                <th>published</th>
                <th>Restore</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($news as $data)
                <tr>
                    <td>{{$data->newsTitle}}</td>
                    <td>{{$data->content}}</td>
                    <td>{{$data->author}}</td>
                    <td>@if ($data->published)
                        yes
                    @else
                        No
                    @endif</td></td>
                    <td><a href="restoreNews/{{$data->id}}"><i class="fa fa-database"></i></a></td>
                    <td><a href="destroyNews/{{$data->id}}"><i class="fa fa-trash"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>


