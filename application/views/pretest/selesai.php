					<div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
							    <form method="post#" action="<?= base_url('pretest/mulai'); ?>">
		                            <div class="card-header">
									    <h4 class="card-title">
											Selamat, Level anda <b><?= $pretest['level']; ?></b>.
										</h4>
										<P>
										<?php if (!$pretest['soal_16'])
										{
											echo '<i>Anda telah menyelesaikan 15 Pertanyaan BASIC dan tidak perlu melanjutkan kepertanyaan berikutnya.</i>';
										}
										?>
										<P>
                                        </br>Terima Kasih anda telah menyelesaikan pretest.
                                        </br>Kami akan segera menghubungi anda.
									</div>
		                            <div class="card-content">
                                    </div>
							    </form>
	                        </div> <!-- end card -->
	                    </div> <!--  end col-md-12  -->
                    </div> <!-- end row -->