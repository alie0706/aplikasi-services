                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                        APP-SERVICES <small>Tambah Data Konektor</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <?php
                if($this->session->flashdata('item')) {
                    $message = $this->session->flashdata('item');
                    ?>
                    <div class="<?php echo $message['class'] ?>"><?php echo $message['message']; ?>
                    
                    </div>
                    <?php
                    }
                    
                    ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('konektor/post'); ?>
                                <div class="form-group">
                                    <label>Kode Konektor</label>
                                    <input type="text" name="kd_konektor" class="form-control" placeholder="kode Konektor" maxlength="2" onkeyup="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label>Nama Konektor</label>
                                    <input type="text" name="nama_konektor" class="form-control" placeholder="nama Konektor">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" id="kategori" class="form-control">
                                    <option value='0'>Silahkan Pilih</option>
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                <label for="sel1">Pilih Jenis</label>
                                <select class="form-control" name="jenis" id="jenis">
                                    
                                    <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Pilih Merk</label>
                                    <select class="form-control" name="merk" id="merk">
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="sel1">Pilih Jenis Obat</label>
                                    <select class="form-control" name="jenis_obat" id="jenis_obat">
                                        <!-- Merk motor akan diload menggunakan ajax, dan ditampilkan disini -->
                                    </select>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('konektor','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->

                <script>

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
    </script>