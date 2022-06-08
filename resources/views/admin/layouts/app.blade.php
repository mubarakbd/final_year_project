@include("admin.includes.header")
<body>
<div id="app">
    <div class="main-wrapper">

        <div class="navbar-bg"></div>
       @include("admin.includes.topbare")


        <div class="main-sidebar">
        @include("admin.includes.sidebar");
        </div>

        <div class="main-content">
         @yield("contents")
        </div>

    </div>
</div>
@include("admin.includes.footer")