<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Update News</h2>
  <form action="{{route('updateNews', $news->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="newsTitle" placeholder="Enter title" name="newsTitle" value="{{$news->newsTitle}}">
    </div>
    <div class="form-group">
      <label for="content">Content:</label>
      <input type="text" class="form-control" id="content" placeholder="Enter content" name="content" value="{{$news->content}}">
    </div>
    <div class="form-group">
        <label for="author">author:</label>
        <input type="text" class="form-control" id="author" name="author" value="{{$news->author}}">
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published" {{ $news->published ? 'checked' : '' }}>Published</label>
    </div>
    <button type="submit" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>

