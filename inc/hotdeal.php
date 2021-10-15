
		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3 id="day"></h3>
										<span >Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="hour"></h3>
										<span >Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="min"></h3>
										<span >Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3 id="sec"></h3>
										<span >Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Ưu đãi siêu hấp dẫn</h2>
							<p>Giảm giá lên tới 50%, Thời gian có hạn</p>
							<a class="primary-btn cta-btn" href="#">Mua ngay</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->
        <script>
            // Set the date we're counting down to
            var countDownDate = new Date("Dec 1, 2021 00:00:00").getTime();

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

                // Output the result in an element with id="demo"
                document.getElementById("day").innerHTML = days;
                document.getElementById("hour").innerHTML = hours;
                document.getElementById("min").innerHTML = minutes;
                document.getElementById("sec").innerHTML = seconds;

                // If the count down is over, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>