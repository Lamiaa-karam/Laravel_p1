<table border="1">
    @foreach ($cars as $car)
    <tr>
        <td>{{$car->carTitle}}</td>
        <td>{{$car->description}}</td>
        <td>{{$car->published}}</td>
        <td><a href="editCar/{{$car->id}}">Edit</a></td>
    </tr>
@endforeach
</table>