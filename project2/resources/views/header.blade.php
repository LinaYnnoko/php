    @foreach(\App\MenuItem::all() as $menuitem)
        <input type="button" value="{{$menuitem->article}}" onclick="location.href='{{url($menuitem->route)}}'">
    @endforeach
