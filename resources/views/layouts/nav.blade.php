<ul class="nav navbar-nav">
    <li class="dropdown nav-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown" ><img src="/uploads/users/{{ Auth::user()->picture }}"
		alt="Alternate Text" class="user-tiny" />&nbsp;
        @if ($flash = session('message')){{ $flash }}@endif
        {{ Auth::user()->name }}
        <b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <div class="navbar-content">
                    <div class="row">
                        <div class="col-md-5">
                            <img src="/uploads/users/{{ Auth::user()->picture }}"
                                alt="Alternate Text" class="user" />
                        </div>
                        <div class="col-md-7">
                            {{ Auth::user()->name }}
                            <p class="text-muted small">
                                {{ Auth::user()->email }}<br />
								<a href="/logout"  class="text-muted small" style="text-decoration: underline; color:#467c83;">Sign Out</a></p>
                            
                            <a href="/profile" class="btn btn-cta btn-cta-body" style="color:#000;">View Profile</a><div id="status"></div>
                        </div>
                    </div>
                </div>
                
            </li>
        </ul>
    </li>
</ul>