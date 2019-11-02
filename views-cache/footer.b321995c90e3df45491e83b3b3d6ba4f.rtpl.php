<?php if(!class_exists('Rain\Tpl')){exit;}?>  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
    </div>
    <strong>&copy; 2019 <a href="https://andrefellipe.com" target="_blank" style="color: inherit;">André Fellipe</a></strong>
  </footer>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/resources/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/resources/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/resources/admin/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="/resources/admin/plugins/datatables/datatables.js"></script>
<!-- Select2 -->
<script src="/resources/admin/plugins/select2/select2.full.min.js"></script>

<!-- page script -->
<script>

  $(document).ready(function () {

    $('#search-table').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": false
    });

    $('.select2').select2();

    $('.products_select').select2();

    $('.services_select').select2();

    var i = 0;

    $('#addService').click(function() {

      i++;
      $('#services_form').append('<tr id="row'+i+'"><td><select name="des_services_description[]" class="form-control services_select" style="width: 100%"><?php $counter1=-1;  if( isset($services) && ( is_array($services) || $services instanceof Traversable ) && sizeof($services) ) foreach( $services as $key1 => $value1 ){ $counter1++; ?><option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?></select></td><td><input type="text" name="qtd_service[]" placeholder="Quantidade" class="form-control" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removeService">X</button></td></tr>');

      $('.services_select').select2();
    });

    $(document).on('click', '.btn_removeService', function() {
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });

    $('#addItem').click(function() {

      i++;
      $('#item_form').append('<tr id="row'+i+'"><td><input type="text" name="item[]" placeholder="Item" class="form-control" required /></td><td><input type="text" name="des_description[]" placeholder="Descrição" class="form-control" required /></td><td><input type="text" name="qtd[]" placeholder="Qtd." class="form-control" required /></td><td><input type="text" name="unit[]" placeholder="Unid." class="form-control" required /></td><td><input type="text" name="price[]" placeholder="P. Unit." class="form-control" required /></td><td><input type="text" name="total_price[]" placeholder="Total" class="form-control" required /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removeItem">X</button></td></tr>');
    });

    $(document).on('click', '.btn_removeItem', function() {
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });

    $('#add').click(function() {

      i++;
      $('#document_due_form').append('<tr id="row'+i+'"><td><input type="text" name="des_doc_name[]" placeholder="Nome do Documento" class="form-control" /></td><td><input type="date" name="dt_due[]" placeholder="Data de Vencimento" class="form-control" /></td><td><button type="button" name="remove" id="'+i
        +'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });

    $('#addProduct').click(function() {

      i++;
      $('#products_form').append('<tr id="row'+i+'"><td><select name="des_products_description[]" class="form-control products_select" style="width: 100%"><?php $counter1=-1;  if( isset($products) && ( is_array($products) || $products instanceof Traversable ) && sizeof($products) ) foreach( $products as $key1 => $value1 ){ $counter1++; ?><option><?php echo htmlspecialchars( $value1["des_description"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option><?php } ?></select></td><td><input type="text" name="qtd_material[]" placeholder="Quantidade" class="form-control" required/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_removeProduct">X</button></td></tr>');

      $('.products_select').select2();
    });

    $(document).on('click', '.btn_removeProduct', function() {
      var button_id = $(this).attr("id");
      $('#row'+button_id+'').remove();
    });

  });

</script>
</body>
</html>