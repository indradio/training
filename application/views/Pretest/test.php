                    <div class="row">
	                    <div class="col-md-9">
	                        <div class="card">
							    <form method="#" action="#">
		                            <div class="card-header">
									    <h4 class="card-title">
											Pertanyaan 
										</h4>
									</div>
		                            <div class="card-content">
	                                    <div class="form-group">
                                            <?php if ($soal['gambar_pertanyaan']){ ?>
                                            <div class="photo">
                                                <img src="<?= base_url(); ?>assets/img/faces/face-2.jpg" />
                                            </div>
                                            </br>
                                            <?php } ?>
                                            <textarea class="form-control" placeholder="Here can be your nice text" rows="5" readonly="true"><?= $soal['pertanyaan']; ?></textarea>
	                                    </div>
	                                    <div class="form-group">
                                            <label>Pilihan Jawaban</label>
                                            <p>
                                            <div class=" btn-group-toggle" data-toggle="buttons">
                                                <!-- Gunakan if sebelum gambar -->
                                                <?php if ($soal['gambar_a']){ ?>
                                                    <div class="photo">
                                                        <img src="<?= base_url(); ?>assets/img/faces/face-2.jpg" />
                                                    </div>
                                                    </br>
                                                <?php } ?>
                                                <label class="btn btn-info">
                                                    <input type="radio" name="options" id="option1" autocomplete="off"> <?= $soal['pilihan_a']; ?>
                                                </label>
                                                </br>
                                                <?php if ($soal['gambar_b']){ ?>
                                                <p>
                                                <div class="photo">
                                                    <img src="<?= base_url(); ?>assets/img/faces/face-2.jpg" />
                                                </div>
                                                <?php } ?>
                                                </br>
                                                <label class="btn btn-info">
                                                    <input type="radio" name="options" id="option2" autocomplete="off"> <?= $soal['pilihan_b']; ?>
                                                </label>
                                                </br>
                                                <?php if ($soal['gambar_c']){ ?>
                                                <p>
                                                <div class="photo">
                                                    <img src="<?= base_url(); ?>assets/img/faces/face-2.jpg" />
                                                </div>
                                                <?php } ?>
                                                </br>
                                                <label class="btn btn-info">
                                                    <input type="radio" name="options" id="option3" autocomplete="off"> <?= $soal['pilihan_c']; ?>
                                                </label>
                                                </br>
                                                <?php if ($soal['gambar_c']){ ?>
                                                <p>
                                                <div class="photo">
                                                    <img src="<?= base_url(); ?>assets/img/faces/face-2.jpg" />
                                                </div>
                                                <?php } ?>
                                                </br>
                                                <label class="btn btn-info">
                                                    <input type="radio" name="options" id="option4" autocomplete="off"> <?= $soal['pilihan_d']; ?>
                                                </label>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="form-group text-right">
                                        <button type="button" class="btn btn-wd btn-success btn-fill btn-move-left">
	                                            <span class="btn-label">
	                                                <i class="ti-angle-left"></i>
	                                            </span>
	                                            Back
	                                        </button>

	                                        <button type="button" class="btn btn-wd btn-success btn-fill btn-move-right">
												Next
	                                            <span class="btn-label">
	                                                <i class="ti-angle-right"></i>
	                                            </span>
											</button>
                                        </div>
                                    </div>
							    </form>
	                        </div> <!-- end card -->
	                    </div> <!--  end col-md-6  -->
	                    <div class="col-md-3">
	                        <div class="card">
								<form class="form-horizontal">
		                            <div class="card-header">
										<h4 class="card-title">
										</h4>
									</div>
		                            <div class="card-content">
										<div class="form-group">
		                                    <label class="col-md-9 control-label"><span id="durasi"></span></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-1 control-label"></label>
                                            <div class="col-md-10">
                                                <ul class="pagination">
                                                    <li class="active">
                                                        <a href="#pdp">1</a>
                                                    </li>
                                                    <li>
                                                        <a href="#pdp">2</a>
                                                        <a href="#pdp">3</a>
                                                        <a href="#pdp">4</a>
                                                        <a href="#pdp">5</a>
                                                        <a href="#pdp">6</a>
                                                        <a href="#pdp">7</a>
                                                        <a href="#pdp">8</a>
                                                        <a href="#pdp">9</a>
                                                        <a href="#pdp">10</a>
                                                        <a href="#pdp">11</a>
                                                        <a href="#pdp">12</a>
                                                        <a href="#pdp">13</a>
                                                        <a href="#pdp">14</a>
                                                        <a href="#pdp">15</a>
                                                    </li>
                                                </ul>
                                            </div>
									    </div>
									</div>
                                </form>
                            </div> <!-- end card -->
	                	</div> <!--  end col-md-3  -->
                    </div> <!-- end row -->
                    <script>
                        // Set the date we're counting down to
                        <?php date('M d, Y H:i:s'); ?>
                        var countDownDate = new Date("Dec 10, 2019 14:32:25").getTime();

                        // Update the count down every 1 second
                        var x = setInterval(function() {

                        // Get today's date and time
                        var now = new Date().getTime();

                        // Find the distance between now and the count down date
                        var distance = countDownDate - now;

                        // Time calculations for days, hours, minutes and seconds
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        // Display the result in the element with id="demo"
                        document.getElementById("durasi").innerHTML = "Waktu Anda " + minutes + " m " + seconds + " s ";

                        // If the count down is finished, write some text
                        if (distance < 0) {
                            clearInterval(x);
                            document.getElementById("durasi").innerHTML = "WAKTU TELAH HABIS";
                        }
                        }, 1000);
                    </script>