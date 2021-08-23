
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">{{__(key:'messages.bag_name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li class="nav-item">
            <a class="nav-link active" aria-current="page"  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}</a>
            </li>
        @endforeach


        </ul>
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="{{__(key:'messages.search')}}" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">{{__(key:'messages.search')}}</button>
        </form>
    </div>
    </div>
</nav>
<div>
    @yield('header');
  </div>

  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
  @yield('sctipts');































