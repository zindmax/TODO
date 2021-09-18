<header class="bg-dark mb-3" style="height: 75px">
    <div class="container h-100">
        <div class="d-flex align-items-centre">
            <form id="logoutForm" action={{route("logout")}} method='post'>
                @csrf
                <a class="logoutLink" href="route('logout)">Logout</a>
            </form>
        </div>
    </div>
</header>
