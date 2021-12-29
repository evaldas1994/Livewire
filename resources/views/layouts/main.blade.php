<div class="wrapper">
    @include('layouts.side_nav')

    <div class="main">
        @include('layouts.top_nav')

        <main class="content">
            <div class="container-fluid p-0">
                @yield('content')
            </div>
        </main>

        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a href="https://www.dineta.eu/" target="_blank" class="text-muted"><strong>UAB Dineta</strong></a> &copy;
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="#">{{ session()->get('params.name') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
    </div>
</div>
