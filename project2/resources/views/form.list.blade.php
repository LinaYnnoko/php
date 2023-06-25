@section('form.list')
    @php
        $types=\App\Type::all()->get();
        $cities=\App\City::all()->get();
        $colors=\App\Color::all()->get();
    @endphp
    <select name="type">
        @foreach    ($types as $type)
            <option value="{{$type->id}}">{{$type->type}}</option>
        @endforeach
    </select>
    <select name="city">
        @foreach    ($cities as $type)
            <option value="{{$type->id}}">{{$type->city}}</option>
        @endforeach
    </select>
    <select name="color">
        @foreach    ($colors as $type)
            <option value="{{$type->id}}">{{$type->color}}</option>
        @endforeach
    </select>
@endsection
