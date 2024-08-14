<form action="{{route('car.update', $data->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @if($errors->any())
        {{--        @dd($errors)--}}
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3">
        <label for="car_model" class="form-label">Model</label>
        <input type="text" class="form-control" id="car_model" name="car_model" value="{{$data->car_model}}">
    </div>
    <div class="mb-3">
        <label for="car_image" class="form-label">Image</label>
        <input type="file" class="form-control" id="car_image" name="car_image">
        <img src="{{asset('images/'.$data->car_image)}}">
    </div>
    <div class="mb-3">
        <label for="manufacturer" class="form-label">Manufacturer</label>
        <input type="text" class="form-control" id="manufacturer" name="manufacturer" value="{{$data->manufacturer}}">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price" value="{{$data->price}}">
    </div>
    <div class="mb-3">
        <label for="year" class="form-label">Year</label>
        <input type="number" class="form-control" id="year" name="year" value="{{$data->year}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
