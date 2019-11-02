<?php if(!class_exists('Rain\Tpl')){exit;}?>  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <!-- Empty for now -->
    </div>
    <!-- Default to the left -->
    <strong>&copy; 2019 <a href="https://andrefellipe.com" target="_blank" style="color: inherit;">André Fellipe</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/resources/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/resources/admin/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="/resources/admin/plugins/datatables/datatables.js"></script>
<!-- Date range picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- InputMask -->
<script src="/resources/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/resources/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/resources/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>


<!-- page script -->
<script>
  $(function () {

    $('#all-proposals').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "order": [[0, "desc"]],
    });

    $('#all-users').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false
    });

    $('#all-services').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "order": [[0, "desc"]],
    });

    $('#my-records').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": false,
      "ordering": true,
      "info": false,
      "order": [[1, "desc"]],
    });

    $('#all-records').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false,
      "order": [[1, "desc"]],
    });

    $('input[name="absence-date"]').daterangepicker({
      "singleDatePicker": true,
      "locale": {
        "format": "DD/MM/YYYY",
        "daysOfWeek": [
        "Dom",
        "Seg",
        "Ter",
        "Qua",
        "Qui",
        "Sex",
        "Sáb"
        ],
        "monthNames": [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
        ]
      }
    });

    $('input[name="log-date-hour"]').daterangepicker({
      "singleDatePicker": true,
      "timePicker": true,
      "locale": {
        "format": "DD/MM/YYYY hh:mm A",
        "applyLabel": "Selecionar",
        "cancelLabel": "Cancelar",
        "daysOfWeek": [
        "Dom",
        "Seg",
        "Ter",
        "Qua",
        "Qui",
        "Sex",
        "Sáb"
        ],
        "monthNames": [
        "Janeiro",
        "Fevereiro",
        "Março",
        "Abril",
        "Maio",
        "Junho",
        "Julho",
        "Agosto",
        "Setembro",
        "Outubro",
        "Novembro",
        "Dezembro"
        ]
      }
    });

    $('[data-mask]').inputmask()

  });

</script>
</body>
</html>