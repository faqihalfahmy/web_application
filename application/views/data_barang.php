<div class="container">
    <h1>Data Barang</h1>
 
    <h3>www.alatkedokteran.id</h3>
    <br />
    <button class="btn btn-success" onclick="add_data_barang()"><i class="glyphicon glyphicon-plus"></i> Tambah Barang</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>merk</th>
          <th>kategori</th>
          <th>n_barang</th>
          <th>sn</th>
          <th>tgl_in</th>
          <th>petugas_in</th>
          <th>tgl_out</th>
          <th>tujuan</th>
          <th>petugas_out</th>
          <th>garansi_1</th>
          <th>garansi_2</th>
          <th>garansi_3</th>
          <th>garansi_4</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
 
      <tfoot>
        <tr>
          <th>merk</th>
          <th>kategori</th>
          <th>n_barang</th>
          <th>sn</th>
          <th>tgl_in</th>
          <th>petugas_in</th>
          <th>tgl_out</th>
          <th>tujuan</th>
          <th>petugas_out</th>
          <th>garansi_1</th>
          <th>garansi_2</th>
          <th>garansi_3</th>
          <th>garansi_4</th>
      </tfoot>
    </table>
  </div>
  
  <script type="text/javascript">
 
    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('data_barang/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        {
          "targets": [ -1 ], //last column
          "orderable": false, //set idt orderable
        },
        ],
 
      });
    });
 
    function add_data_barang()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add data_barang'); // Set Title to Bootstrap modal title
    }
 
    function edit_data_barang(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
 
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('data_barang/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
 
            $('[name="id"]').val(data.id);
            $('[name="merk"]').val(data.merk);
            $('[name="kategori"]').val(data.kategori);
            $('[name="n_barang"]').val(data.n_barang);
            $('[name="sn"]').val(data.sn);
            $('[name="tgl_in"]').val(data.tgl_in);
            $('[name="petugas_in"]').val(data.petugas_in);
            $('[name="tgl_out"]').val(data.tgl_out);
            $('[name="tujuan"]').val(data.tujuan);
            $('[name="petugas_out"]').val(data.petugas_out);
            $('[name="garansi_1"]').val(data.garansi_1);
            $('[name="garansi_2"]').val(data.garansi_2);
            $('[name="garansi_3"]').val(data.garansi_3);
            $('[name="garansi_4"]').val(data.garansi_4);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit data_barang'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
 
    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax
    }
 
    function save()
    {
      var url;
      if(save_method == 'add')
      {
          url = "<?php echo site_url('data_barang/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('data_barang/ajax_update')?>";
      }
 
       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
 
    function delete_data_barang(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('data_barang/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
 
      }
    }
 
  </script>
 
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">data_barang Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">First Name</label>
              <div class="col-md-9">
                <input name="firstName" placeholder="First Name" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Last Name</label>
              <div class="col-md-9">
                <input name="lastName" placeholder="Last Name" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gender</label>
              <div class="col-md-9">
                <select name="gender" class="form-control">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="address" placeholder="Address"class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Date of Birth</label>
              <div class="col-md-9">
                <input name="dob" placeholder="yyyy-mm-dd" class="form-control" type="text">
              </div>
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->