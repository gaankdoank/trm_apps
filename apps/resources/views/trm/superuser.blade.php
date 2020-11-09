
{{ Auth::user()->name }}
{{ Auth::user()-> id }}
{{ Auth::user()-> phone }}

    @if(Auth::user()->role == 2) 
    IP Planning Team
    @endif

    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>