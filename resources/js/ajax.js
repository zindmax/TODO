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
            let item = "<li class='list-group-item'>" + data.item.item + "</li>";
            $(item).prependTo($(".list-container:first-child"));
            //$(".list-container").insertBefore($(item), $(".list-container:first-child"));//.prepend()
        }
    })
});
