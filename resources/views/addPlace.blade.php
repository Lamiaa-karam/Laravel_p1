<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Place</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Place</h2>
  <form action="{{route('addPlace')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="imageTitle">Image Title:</label>
      <input type="text" class="form-control" id="imageTitle" placeholder="Enter title" name="imageTitle" value="{{old('imageTitle')}}">
      @error('imageTitle')
          <div class="alert alert-warning">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
    <label for="image">Image:</label>
    <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
    @error('image')
    <div class="alert alert-warning">{{$message}}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="from">from:</label>
    <input type="number" class="form-control" id="from" placeholder="Enter Price" name="from" value="{{old('from')}}">
    @error('from')
    <div class="alert alert-warning">{{$message}}</div>
    @enderror
    </div>
    <div class="form-group">
    <label for="to">To:</label>
    <input type="number" class="form-control" id="to" placeholder="Enter Price" name="to" value="{{old('to')}}">
    @error('to')
    <div class="alert alert-warning">{{$message}}</div>
    @enderror
    </div>    
    <div class="form-group">
        <label for="shortDescription">Short Description:</label>
        <textarea class="form-control" rows="5" id="shortDescription" name="shortDescription">{{old('shortDescription')}}</textarea>
        @error('description')
          <div class="alert alert-warning">{{$message}}</div>
      @enderror
    </div>    
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
