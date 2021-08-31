<!-- Fixed navbar -->
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/"><span style="color:#57f74d">EXPENSE </span> TRACKER</a>
    <a href="/search_scam" class="d-block d-sm-none"><i class="fa fa-search" aria-hidden="true"></i></a>
    <button class="btn btn-outline-primary my-2 my-sm-0 add_expense" type="button">ADD</button>
    <form class="form-inline  mt-md-0 d-none d-sm-block" action="/search_scam" method="get" style="margin:auto;margin-right:0;">
        <input class="form-control mr-sm-2" type="text" name="query" placeholder="Search" aria-label="Search" value="{{ session()->get('search') }}">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <meta name="csrf-token" content="{!! csrf_token() !!}">
</nav>
<script src="{{asset('/js/validations.js')}}"></script>
