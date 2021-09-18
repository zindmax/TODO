@extends('layouts')

@section('title', 'Todos')

@section('content')
    <div class="border border-dark rounded">
        <form id="storeTodo" class="mx-4 mt-2" action="{{ route("storeTodo") }}" method="post">
            @csrf
            <input type="text" name="addTodo" id="addTodo" placeholder="Enter your todo">
            <input class="btn-submit" type="submit" value="ok">
        </form>
        <ul class="list-group">
            <div class="list-container d-flex flex-column mx-2 mb-2">
                @foreach($todoItems as $item)
                    <li class="list-group-item">
                        <div class="item-container flex-fill mr-2">
                            <div class="d-flex flex-row justify-content-between">
                                <form id="completeTodo" action="{{ route("completeTodo", ['id' => $item->id])}}" method="post">
                                    @csrf
                                    <input class="complete" type="checkbox" name="complete" value="{{$item->complete}}">
                                </form>
                                <p id="itemContainer">{{ $item->item }}</p>
                                <form id="#deleteForm" action="{{ route("deleteTodo", ['id' => $item->id])}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" name="deleteTodo" value="x">
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </div>
        </ul>
    </div>
    <script>
        $(".complete").change(function (){
            $("#completeTodo").submit();
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#storeTodo").on("submit", function (e) {
            e.preventDefault();

            let item = $('input[name=addTodo]').val();

            $.ajax({
                method: "POST",
                url: "/todos",
                data: { item : item },
                success:function (data) {
                    let item = "<li class='list-group-item'>" +
                        "<p>" + data.item.item + "</p>" +
                        "<form method='post' action=''>" +
                        "<input type='submit' name='deleteTodo' value='x'>" +
                        "</form>" +
                        "</li>";
                    $(item).prependTo($(".list-container:first-child"));
                    //$(".list-container").insertBefore($(item), $(".list-container:first-child"));//.prepend()
                }
            })
        });
    </script>
@endsection

