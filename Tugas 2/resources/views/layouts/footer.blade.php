<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
        <nav class="pull-left">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://www.themekita.com"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
        </nav>
        <div class="copyright">
            <a href="http://www.themekita.com">Copyrigh Event Today | 2024</a>
        </div>
        <div>
            Distributed by
            <a target="_blank" href="https://themewagon.com/">Intwenties Creative Center</a>.
        </div>
    </div>
</footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
    <div class="title">Settings</div>
    <div class="custom-content">
        <div class="switcher">
            ...
        </div>
    </div>
    <div class="custom-toggle">
        <i class="icon-settings"></i>
    </div>
</div>
<!-- End Custom template -->

<!-- Core JS Files -->
<script src="{{ asset('style/assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('style/assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('style/assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/chart-circle/circles.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/jsvectormap/jsvectormap.min.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/jsvectormap/world.js') }}"></script>
<script src="{{ asset('style/assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('style/assets/js/kaiadmin.min.js') }}"></script>
<script src="{{ asset('style/assets/js/setting-demo.js') }}"></script>
<script src="{{ asset('style/assets/js/demo.js') }}"></script>

<script>
    $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
    });

    $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
    });

    $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
    });
</script>
</body>

</html>