<header>
    <h1>
        <a href="{{ route("guest.home") }}">
            {{ request()->route()->getName() == "guest.home" ? "comics" : "Return to home" }}
        </a>
    </h1>
</header>