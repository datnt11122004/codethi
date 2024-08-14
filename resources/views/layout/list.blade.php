<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Model</th>
            <th scope="col">Image</th>
            <th scope="col">Manufacturer</th>
            <th scope="col">Price</th>
            <th scope="col">Year</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
        <tr>
            <th scope="row">{{ $item->id }}</th>
            <td>{{ $item->car_model }}</td>
            <td><img src="{{asset('images/'.$item->car_image)}}" alt="no image" width="100px" height="100px"></td>
            <td>{{ $item->manufacturer }}</td>
            <td>{{ $item->price }}</td>
            <td>{{ $item->year }}</td>
            <td>
                <a href="{{ route('car.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('car.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
