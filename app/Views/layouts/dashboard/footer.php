<!-- Main Footer -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io/" target="_blank">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.1.0
    </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<!-- DataTables & Plugins -->
<script src="/assets/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="/assets/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/vendors/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/vendors/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/assets/vendors/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/vendors/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jszip@3.6.0/dist/jszip.min.js" integrity="sha256-MB+WKZmHMme2BRVKpDuIbfs6VlSdUIAY1VroUmE+p8g=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.71/build/pdfmake.min.js" integrity="sha256-bS6eWfovJ7m6LA8EJ5cr9KvSsJ8sJJPBKjtLT6rBryU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/pdfmake@0.1.71/build/vfs_fonts.js" integrity="sha256-GYVrxUb44jHlnIWWe/I6Y4HyW/yTAlA5aL7tkRRu5N4=" crossorigin="anonymous"></script>
<script src="/assets/vendors/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/vendors/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/assets/vendors/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- Ekko Lightbox -->
<script src="https://cdn.jsdelivr.net/npm/ekko-lightbox@5.3.0/dist/ekko-lightbox.min.js" integrity="sha256-Y1rRlwTzT5K5hhCBfAFWABD4cU13QGuRN6P5apfWzVs=" crossorigin="anonymous"></script>
<!-- bs-custom-file-input -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js" integrity="sha256-e0DUqNhsFAzOlhrWXnMOQwRoqrCRlofpWgyhnrIIaPo=" crossorigin="anonymous"></script>
<!-- AdminLTE -->
<script src="/assets/js/adminlte.js"></script>
<!-- Custom Script -->
<?php
if (!empty($custom_js)) {
    foreach ($custom_js as $js) {
        echo $js;
    }
}
?>
</body>

</html>