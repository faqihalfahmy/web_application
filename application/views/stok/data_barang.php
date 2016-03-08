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
        </tr>
      </thead>
      <tbody>
		<td class="dataTables_empty">Loading data from server</td>
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
  <script type="text/javascript" charset="utf-8">
  $(document).ready(function() {
   $('#tbl').dataTable( {
    "bProcessing": true,
    "bServerSide": true,
    'sPaginationType': 'full_numbers',
    "sAjaxSource": "<?=base_url()?>/stok/data_barang/ajax_view_data/",
    "aaSorting": [[ 0, "desc" ]]
   } );
  } );  </script>
