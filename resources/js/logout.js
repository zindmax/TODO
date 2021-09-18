let link = document.getElementsByClassName('logoutLink');
let form = document.getElementById("logoutForm");
$(".logoutLink").on('click', function (e){
    e.preventDefault();
    $("#logoutForm").submit();
});
