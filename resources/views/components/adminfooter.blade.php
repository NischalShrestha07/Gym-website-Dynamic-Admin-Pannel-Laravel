<footer>

</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="Dashboard/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="Dashboard/vendors/chart.js/Chart.min.js"></script>
{{-- <script src="Dashboard/vendors/dat/atables.net/jquery.dataTables.js"></script> --}}
<script src="Dashboard/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="Dashboard/js/dataTables.select.min.js"></script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 5000); // 5 seconds
</script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="Dashboard/js/off-canvas.js"></script>
<script src="Dashboard/js/hoverable-collapse.js"></script>
<script src="Dashboard/js/template.js"></script>
<script src="Dashboard/js/settings.js"></script>
<script src="Dashboard/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="Dashboard/js/dashboard.js"></script>
<script src="Dashboard/js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fade in the alert on page load
        let alertBox = document.querySelectorAll('.custom-alert');

        // Automatically fade out after 5 seconds
        setTimeout(function() {
            alertBox.forEach(function(alert) {
                alert.classList.add('fade-out');
            });
        }, 5000); // 5 seconds

        // Remove the alert from the DOM after the fade-out transition completes
        setTimeout(function() {
            alertBox.forEach(function(alert) {
                alert.remove();
            });
        }, 5500); // 5 seconds + 0.5s for fade-out effect
    });
</script>

</html>