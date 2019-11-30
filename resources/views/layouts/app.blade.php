<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Store</title>
    @yield('before-style')
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=994726b0a40e23f8e5b792e286352d92">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cookie">
    <link rel="stylesheet" href="/assets/fonts/font-awesome.min.css?h=1585abf9beaf49802b3a80bf813edceb">
    <link rel="stylesheet" href="/assets/css/styles.min.css?h=8a9e4c22e472595f80402c199e4b8a36">
    <link rel="stylesheet" href="/assets/css/custom-style.css"/>
    @yield('after-styles')
</head>

<body>
<div>
    <div class="header-dark">
        @include('partials.nav')
{{--        @include('partials.breadcrumbs',['data'=>array(['name'=>'Home','route'=>'/'],['name'=>'Library','route'=>'/'],['name'=>'Goods','route'=>'/'])])--}}

        <div class="container hero bg-dark text-white" style="min-height: 400px">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                   @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
    @include('partials.footer')
@yield('before-scripts')
<script src="/assets/js/jquery.min.js?h=83e266cb1712b47c265f77a8f9e18451"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js?h=63715b63ee49d5fe4844c2ecae071373"></script>
@yield('after-scripts')
<script>
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 768px)").matches) {
            $dropdown.hover(
                function() {
                    const $this = $(this);
                    $this.addClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "true");
                    $this.find($dropdownMenu).addClass(showClass);
                },
                function() {
                    const $this = $(this);
                    $this.removeClass(showClass);
                    $this.find($dropdownToggle).attr("aria-expanded", "false");
                    $this.find($dropdownMenu).removeClass(showClass);
                }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
</script>
</body>

</html>