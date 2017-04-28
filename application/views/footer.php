
    <!-- Javascripts-->
    <script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/essential-plugins.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/plugins/pace.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/jquery.dataTables.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/dataTables.bootstrap.min.js'); ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/select2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-datepicker.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/bootstrap-notify.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/sweetalert.min.js'); ?>"></script>
    <script>
      function register(){
        swal("Data berhasil disimpan!","", "success");
      }

      function update(){
        swal("Data berhasil diubah!","", "success");
      }

      function confirmhapuspasien(id){
        swal({
          title: "Anda yakin akan menghapus data pasien?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Pasien dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyek2trial/c_petugaspendaftaran/hapus_pasien/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }

      function confirmhapusobat(id){
        swal({
          title: "Anda yakin akan menghapus data obat?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Obat dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyek2trial/c_logistik/hapus_obat/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }

      function confirmhapusnonobat(id){
        swal({
          title: "Anda yakin akan menghapus data item medis?",
          text: "Data yang telah dihapus tidak dapat dikembalikan!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Ya",
          cancelButtonText: "Tidak!",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            swal("Deleted!", "Data Item Medis non Obat dengan ID. "+id+" telah dihapus", "success");
            location.href = "http://localhost/proyek2trial/c_logistik/hapus_item_non_obat/"+id;
          } else {
            swal("Cancelled","", "error");
          }
        });
      }
    </script>
    <script type="text/javascript">
      $('#sl').click(function(){
      	$('#tl').loadingBtn();
      	$('#tb').loadingBtn({ text : "Signing In"});
      });
      
      $('#el').click(function(){
      	$('#tl').loadingBtnComplete();
      	$('#tb').loadingBtnComplete({ html : "Sign In"});
      });
      
      $('#demoDate').datepicker({
        format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
      
      $('#demoSelect').select2();
      </script>
  </body>
</html>