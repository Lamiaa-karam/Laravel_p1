<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add News</h2>
  <form action="{{route('addNews')}}" method="POST">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="newsTitle" placeholder="Enter title" name="newsTitle" value="{{old('newsTitle')}}">
      @error('newsTitle')
      <div class="alert alert-warning">{{$message}}</div>
  @enderror
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <textarea type="text" class="form-control" id="content" placeholder="Enter content" name="content">{{old('content')}}</textarea>
      @error('content')
      <div class="alert alert-warning">{{$message}}</div>
  @enderror
    </div>
    <div class="form-group">
        <label for="author">author:</label>
        <input type="text" class="form-control" id="author" name="author" value="{{old('author')}}">
        @error('author')
        <div class="alert alert-warning">{{$message}}</div>
    @enderror
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
