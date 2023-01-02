<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI MASUK <small>Tambah Data Transaksi</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <input class="form-control" type="hidden" name="id_user" value="<?php echo $this->session->userdata('id_user');?>">
                                    <div class="form-group">
                                        <label>No Tanda Terima</label>
                                        <input class="form-control" name="no_tanda_terima" value="<?php echo $record['no_tanda_terima']?>" placeholder="No Tanda Terima" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal terima</label>
                                        <input type="text" name="tgl_terima" id="tgl_terima" value="<?php echo $record['no_tanda_terima']?>" placeholder="Isi tanggal terima" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label>Supplier</label>
                                    <select name="supplier" class="form-control">
                                        <?php foreach ($supplier as $k) {
                                            echo "<option value='$k->id_supplier'";
                                            echo $record['id_supplier']==$k->id_supplier?'selected':'';
                                            echo">$k->nama_supplier</option>";
                                        } ?>
                                    </select>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('jenis','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            TRANSAKSI MASUK <small>Data Transaksi Masuk</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('transaksi_masuk_detail/post/'.$record['id_transaksi'],'Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Konektor</th>
                                                <th>Nama Jenis Obat</th>
                                                <th>Nama Merk</th>
                                                <th>Nama Jenis</th>
                                                <th>Nama Kategori</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Qty</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($list->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->kd_konektor ?></td>
                                                <td><?php echo $r->nama_konektor ?></td>
                                                <td><?php echo $r->nama_jenis_obat ?></td>
                                                <td><?php echo $r->nama_merk ?></td>
                                                <td><?php echo $r->nama_jenis ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo $r->kd_barang ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->qty ?></td>
                                                
                                                <td class="center">
                                                    <?php echo anchor('transaksi_masuk_detail/edit/'.$r->id_transaksi_detail,'Edit'); ?> | 
                                                    <?php echo anchor('transaksi_masuk_detail/delete/'.$r->id_transaksi_detail,'Delete'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <script>
                    $(function()
                {
                    $('#tgl_terima').datepicker({autoclose: true,todayHighlight: true,format: 'yyyy-mm-dd'})
                });
               

                        //pilih combobox
                        $("#kategori").change(function(){

                            // variabel dari nilai combo box kategori
                            var id_kategori = $("#kategori").val();
                            // alert(id_kategori);
                            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                            $.ajax({
                                url : "../jenis/get_jenis",
                                method : "POST",
                                data : {id_kategori:id_kategori},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    
                                    var html = '';
                                    var i;
                                    html += '<option value=0>Silahkan Pilih </option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value='+data[i].id_jenis+'>'+data[i].nama_jenis+'</option>';
                                    }
                                    $('#jenis').html(html);

                                }
                            });
                            });

                            $("#jenis").change(function(){

                            // variabel dari nilai combo box kategori
                            var id_jenis = $("#jenis").val();

                            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                            $.ajax({
                                url : "<?php echo base_url();?>jenis/get_merk",
                                method : "POST",
                                data : {id_jenis:id_jenis},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option value=0>Silahkan Pilih </option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value='+data[i].id_merk+'>'+data[i].nama_merk+'</option>';
                                    }
                                    $('#merk').html(html);

                                }
                            });
                            });

                            $("#merk").change(function(){

                            // variabel dari nilai combo box kategori
                            var id_merk = $("#merk").val();

                            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                            $.ajax({
                                url : "<?php echo base_url();?>merk/get_jenis_obat",
                                method : "POST",
                                data : {id_merk:id_merk},
                                async : false,
                                dataType : 'json',
                                success: function(data){
                                    var html = '';
                                    var i;
                                    html += '<option value=0>Silahkan Pilih </option>';
                                    for(i=0; i<data.length; i++){
                                        html += '<option value='+data[i].id_jenis_obat+'>'+data[i].nama_jenis_obat+'</option>';
                                    }
                                    $('#jenis_obat').html(html);

                                }
                            });
                            });
                            $("#jenis_obat").change(function(){

                                // variabel dari nilai combo box kategori
                                var id_jenis_obat = $("#jenis_obat").val();

                                // Menggunakan ajax untuk mengirim dan dan menerima data dari server
                                $.ajax({
                                    url : "<?php echo base_url();?>jenis_obat/get_konektor",
                                    method : "POST",
                                    data : {id_jenis_obat:id_jenis_obat},
                                    async : false,
                                    dataType : 'json',
                                    success: function(data){
                                        var html = '';
                                        var i;

                                        for(i=0; i<data.length; i++){
                                            html += '<option value='+data[i].id_konektor+'>'+data[i].nama_konektor+'</option>';
                                        }
                                        $('#konektor').html(html);

                                    }
                                });
                                });
                </script>