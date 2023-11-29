<table>
    @foreach ($news as $data)
        <tr>
            <td>{{$data->newsTitle}}</td>
            <td>{{$data->content}}</td>
            <td>{{$data->author}}</td>
            <td>{{$data->published}}</td>
            <td><a href="editNews/{{$data->id}}">Edit</a></td>
            <td><a href="showNews/{{$data->id}}">show</a></td>
        </tr>
    @endforeach
</table>