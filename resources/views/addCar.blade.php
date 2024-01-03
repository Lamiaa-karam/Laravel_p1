<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>{{__('messages.header')}}</h2>
  <form action="{{route('addCar')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="carTitle">{{__('messages.title')}}</label>
      <input type="text" class="form-control" id="carTitle" placeholder="{{__('messages.titlePlaceholder')}}" name="carTitle" value="{{old('carTitle')}}">
      @error('carTitle')
          <div class="alert alert-warning">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">{{__('messages.price')}}</label>
      <input type="number" class="form-control" id="price" placeholder="{{__('messages.pricePlaceholder')}}" name="price" value="{{old('price')}}">
      @error('price')
      <div class="alert alert-warning">{{$message}}</div>
      @enderror
    </div>
    <div class="form-group">
        <label for="description">{{__('messages.description')}}</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{old('description')}}</textarea>
        @error('description')
          <div class="alert alert-warning">{{$message}}</div>
      @enderror
      </div> 
      <div class="form-group">
        <select name="category_id" id="category">
            <option value="">{{__('messages.category')}}</option>
            @foreach ($categories as $category)
                <option value="{{$category -> id}}">{{$category -> categoryName}}</option>
            @endforeach
        </select>
        @error('category_id')
        <div class="alert alert-warning">{{$message}}</div>
         @enderror
      </div>   
      <div class="form-group">
        <label for="image">{{__('messages.image')}}</label>
        <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}">
        @error('image')
        <div class="alert alert-warning">{{$message}}</div>
        @enderror
      </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published"> {{__('messages.published')}}</label>
    </div>
    <button type="submit" class="btn btn-default">{{__('messages.add')}}</button>
  </form>
</div>

</body>
</html>
