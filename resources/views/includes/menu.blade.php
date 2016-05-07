<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand header-logo" href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}" height="42" /></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inventory <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ url('items/manage') }}">Item</a></li>
                  <li><a href="{{ url('outlets/manage') }}">Outlet</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ url('inventories/manage') }}">Inventory</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Transactions</a></li>
                </ul>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('logout') }}">Logout</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>