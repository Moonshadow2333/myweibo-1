<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('home') }}" class="navbar-brand">Weibo App</a>
        <ul class="navbar-nav justify-content-end">
            @if(Auth::check())
            <li class="nav-item"><a href="#" class="nav-link">用户列表</a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-item dropdown-toggle"
                id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expended="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{route('users.show',Auth::user())}}" class="dropdown-item">
                        <a href="#" class="dropdown-item">编辑资料</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" id="logout">
                        <form action="{{route('logout')}}"
                        method="POST">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button class="btn btn-block btn-danger" type="submit"
                            name="button">退出</button>
                        </form>
                    </a>
                </div>
            </li>
            @else
            <li class="nav-item"><a href="{{ route('help') }}" class="nav-link">帮助</a></li>
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">登录</a></li>
            @endif
        </ul>
    </div>
</nav>
 -->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container ">
    <a class="navbar-brand" href="{{ route('home') }}">Weibo App</a>
    <ul class="navbar-nav justify-content-end">
      @if (Auth::check())
        <li class="nav-item"><a class="nav-link" href="{{route('users.index')}}">用户列表</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('users.show', Auth::user()) }}">个人中心</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('users.edit',Auth::user())}}">编辑资料</a></li>
        <li class="nav-item"><a class="nav-link" id="logout" href="#">
          <form action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-block btn-danger" type="submit" name="button">退出</button>
          </form></a>
        </li>
      @else
        <li class="nav-item"><a class="nav-link" href="{{ route('help') }}">帮助</a></li>
        <li class="nav-item" ><a class="nav-link" href="{{ route('login') }}">登录</a></li>
      @endif

    </ul>
  </div>
</nav>

