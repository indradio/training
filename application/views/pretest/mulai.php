<div class="row">
	                    <div class="col-md-12">
	                        <div class="card">
							    <form method="post#" action="<?= base_url('pretest/mulai'); ?>">
		                            <div class="card-header">
									    <h4 class="card-title">
                                        Test akan segera dimulai, perhatikan hal-hal berikut sebelum memulai test:
                                        </h4>
                                        <P>
                                        </br>1. Pastikan koneksi internet anda dalam kondisi baik / stabil.
                                        </br>2. Test akan dilakukan dalam 15 Menit.
                                        </br>3. Selama test, waktu akan terus berjalan bahkan jika anda tinggalkan.
                                        </br>4. Sebaiknya anda selesaikan dulu pekerjaan lain yang dapat mengganggu tes.
                                        </br>5. Sebaiknya matikan ponsel anda selama tes berlangsung.
                                        </br>6. Soal yang sudah dijawab tidak dapat diulang.
                                        </br>7. Tes ini bertujuan menentukan level awal anda, hindari menjawab pertanyaan dengan menebak.
                                        </br>8. Jika anda tidak tahu jawaban suatu pertanyaan, tidak perlu ragu untuk pilih "E. Tidak tahu".
									</div>
		                            <div class="card-content">
                                        <div class="form-group text-right">
	                                        <button type="submit" class="btn btn-wd btn-success btn-fill btn-magnify">
                                                <span class="btn-label">
                                                    <i class="ti-pencil-alt"></i>
	                                            </span>
                                                Saya Siap, Mulai Test
											</button>
                                        </div>
                                    </div>
							    </form>
	                        </div> <!-- end card -->
	                    </div> <!--  end col-md-12  -->
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