<div class="container">
    <nav class="navbar" role="navigation" aria-label="main navigation">
        {{-- <div class="navbar-brand">
            <a class="navbar-item" href="./">
                <img src="./logo.png" width="139" height="107">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
                data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div> --}}

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="/">
                    Home
                </a>

                <a class="navbar-item" href="/products">
                    Product
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    <a class="navbar-item" href="/carts">
                        Cart
                    </a>
                    
                    @if (Session::get('loggedIn'))
                        <a class="navbar-item" href="/users">
                            Hi, {{ Session::get('username') }}
                        </a>
                        <a class="navbar-item" id="logout">
                            Logout
                        </a>
                        <script>
                            $(document).ready(function(){
                                $("#logout").click(function(event){
                                    event.preventDefault();
                                    $.post("/logout", {
                                        '_token': '{{csrf_token()}}'
                                    });
                                });
                            });
                        </script>
                    @else
                        <a class="navbar-item" href="/login">
                            Hi, Please login
                        </a>
                    @endif
                    {{-- <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Menu
                        </a>

                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                About
                            </a>
                            <a class="navbar-item">
                                Jobs
                            </a>
                            <a class="navbar-item">
                                Contact
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                Report an issue
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </nav>
</div>
