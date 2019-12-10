<div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-12">
							<h4 class="title">Data Soal Test</h4>
							
	                        <div class="card">
	                        	<div class="card-content">
	                        		<button type="button" class="btn btn-wd btn-success" data-toggle="modal" data-target="#Tambah"><span class="btn-label"><i class="fa fa-check"></i> Tambah</span></button> 
	                        		<button type="button" class="btn btn-wd btn-warning"><span class="btn-label"><i class="ti-download"></i> Report</span></button>
	                            <div class="card-content">

	                                <div class="toolbar">
	                                    <!--Here you can write extra buttons/actions for the toolbar-->

	                               </div>
	                                    </div>
                                    <div class="fresh-datatables">
										<table id="datatables" class="table table-striped table-no-bordered table-hover" >
										<thead>
											<tr>
												<th>No</th>
												<th>Pertanyaan</th>
												<th>Pilihan A</th>
												<th>Pilihan B</th>
												<th>Pilihan C</th>
												<th>Pilihan D</th>
												<th>Jawaban</th>
												<th>Level</th>
												<th>Tipe Soal <th>
												<th class="disabled-sorting">Actions</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>No</th>
												<th>Pertanyaan</th>
												<th>Pilihan A</th>
												<th>Pilihan B</th>
												<th>Pilihan C</th>
												<th>Pilihan D</th>
												<th>Jawaban</th>
												<th>Level</th>
												<th>Tipe Soal <th>
												<th class="disabled-sorting">Actions</th>
											</tr>
										</tfoot>
										<tbody>
											<?php foreach ($soal as $s) :?>
											<tr>

												<td><?= $s['no']; ?></td>
												<td><?= $s['pertanyaan']; ?></td>
												<td><?= $s['pilihan_a']; ?></td>
												<td><?= $s['pilihan_b']; ?></td>
												<td><?= $s['pilihan_c']; ?></td>
												<td><?= $s['pilihan_d']; ?></td>
												<td><?= $s['jawaban']; ?></td>
												<td><?= $s['level']; ?></td>
												<td><?= $s['tipe']; ?></td>
												<td> 
													 <a href="javascript:;"    												  
													  data-id="<?php echo $s['id'] ?>"
    												  data-no="<?php echo $s['no'] ?>"
    												  data-ques="<?php echo $s['pertanyaan'] ?>"
   									                  data-pilihan_a="<?php echo $s['pilihan_a'] ?>"
   											          data-pilihan_b="<?php echo $s['pilihan_b'] ?>"
    												  data-pilihan_c="<?php echo $s['pilihan_c'] ?>"
    												  data-pilihan_d="<?php echo $s['pilihan_d'] ?>"
   									                  data-jawaban="<?php echo $s['jawaban'] ?>"
   											          data-level="<?php echo $s['level'] ?>"
   											          data-tipe="<?php echo $s['tipe'] ?>"
    												  data-toggle="modal" data-target="#edit-data">
    												  <button  data-toggle="modal" data-target="#ubah-data" class="btn btn-simple btn-warning btn-icon like"><i class="ti-pencil-alt"></i></button>
													<a href="#" class="btn btn-simple btn-danger btn-icon edit"><i class="ti-trash"></i></a>
												 
												</td>
											</tr>
											<?php endforeach; ?>
										   </tbody>
									    </table>
									</div>

<div class="modal fade" id="Tambah" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tambah Soal</h4>
        </div>
        <div class="modal-body">
			<form class="form-horizontal" method="post" action="<?= base_url('Pretest/addquest'); ?>">
		        <div class="card-content">
					<div class="form-group">
		            <label class="col-md-3 control-label">No</label>
		            <div class="col-md-9">
		            <input type="text" name="no" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pertanyaan</label>
		            <div class="col-md-9">
		             <input type="text" name="pertanyaan" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan A</label>
		            <div class="col-md-9">
		            <input type="text" name="pa" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan B</label>
		            <div class="col-md-9">
		             <input type="text" name="pb" class="form-control">
		            </div>
		            </div>
					</div><div class="form-group">
		            <label class="col-md-3 control-label">Pilihan C</label>
		            <div class="col-md-9">
		            <input type="text" name="pc" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan D</label>
		            <div class="col-md-9">
		             <input type="text" name="pd" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Jawaban</label>
		            <div class="col-md-9">
		            <input type="text" name="jawaban" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Level</label>
		            <div class="col-md-9">
		             <input type="text" name="level" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Tipe Soal</label>
		            <div class="col-md-9">
		             <input type="text" name="tipe" class="form-control">
		            </div>
		            </div>
					<div class="card-footer">
					<div class="form-group">
						<label class="col-md-3"></label>
						<div class="col-md-9">
						<button type="submit" class="btn btn-fill btn-info">
						Tambah
						</button>
					</div>
					</div>
				</div>
			</form>
        </div>
      </div>
      
<!-- Modal Ubah -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Ubah Data</h4>
            </div>
            <form class="form-horizontal" action="<?php echo base_url('Pretest/updateques')?>" method="post" enctype="multipart/form-data" role="form">
	            <div class="modal-body">
	                    <div class="form-group">
		            <label class="col-md-3 control-label">No</label>
		            <div class="col-md-9">
		            <input type="hidden" name="id" id="id" class="form-control">
		            <input type="text" name="no" id="no" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pertanyaan</label>
		            <div class="col-md-9">
		             <input type="text" name="pertanyaan" id="pertanyaan" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan A</label>
		            <div class="col-md-9">
		            <input type="text" name="pa" id="pa" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan B</label>
		            <div class="col-md-9">
		             <input type="text" name="pb" id="pb" class="form-control">
		            </div>
		            </div>
					</div><div class="form-group">
		            <label class="col-md-3 control-label">Pilihan C</label>
		            <div class="col-md-9">
		            <input type="text" name="pc" id="pc" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Pilihan D</label>
		            <div class="col-md-9">
		             <input type="text" name="pd" id="pd" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Jawaban</label>
		            <div class="col-md-9">
		            <input type="text" name="jawaban" id="jawaban" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Level</label>
		            <div class="col-md-9">
		             <input type="text" name="level" id="level" class="form-control">
		            </div>
		            </div>
		            <div class="form-group">
		            <label class="col-md-3 control-label">Tipe Soal</label>
		            <div class="col-md-9">
		             <input type="text" name="tipe" id="tipe" class="form-control">
		            </div>
		            </div>
	                <div class="modal-footer">
	                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
	                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
	                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END Modal Ubah -->

    </div>
  </div>
</div>
</div><!--  end card  -->
</div> <!-- end col-md-12 -->
</div> <!-- end row -->
</div>
</div>



	        <script type="text/javascript">
	    $(document).ready(function() {

	        $('#datatables').DataTable({
	            "pagingType": "full_numbers",
	            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
	            responsive: true,
	            language: {
	            search: "_INPUT_",
		            searchPlaceholder: "Search records",
		        }
	        });


	        var table = $('#datatables').DataTable();
	         // Edit record
	         table.on( 'click', '.edit', function () {
	            $tr = $(this).closest('tr');

	            var data = table.row($tr).data();
	            alert( 'You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.' );
	         } );

	         // Delete a record
	         table.on( 'click', '.remove', function (e) {
	            $tr = $(this).closest('tr');
	            table.row($tr).remove().draw();
	            e.preventDefault();
	         } );

	        //Like record
	        table.on( 'click', '.like', function () {
	            alert('You clicked on Like button');
	         });

	    });$(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#no').attr("value",div.data('no'));
            modal.find('#pertanyaan').attr("value",div.data('ques'));
            modal.find('#pa').attr("value",div.data('pilihan_a'));
            modal.find('#pb').attr("value",div.data('pilihan_b'));
            modal.find('#pc').attr("value",div.data('pilihan_c'));
            modal.find('#pd').attr("value",div.data('pilihan_d'));
            modal.find('#level').attr("value",div.data('level'));
            modal.find('#jawaban').attr("value",div.data('jawaban'));
            modal.find('#tipe').attr("value",div.data('Tipe'));
        });
    });
	</script>		