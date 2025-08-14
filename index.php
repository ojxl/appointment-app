<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/cart_functions.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<?php include "templates/header.php"; ?>

<H4>Here at BooksAgain we do our shopping different! instead od buying online, you can just add the desired books to your cart, book an appointment and go pick them up at your closest in store location!</H4>

	</div><!--header-wrap-->

	<section id="billboard">

		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<button class="prev slick-arrow">
						<i class="icon icon-arrow-left"></i>
					</button>

				
						<div class="slider-item">
							<div class="banner-content">
								<h2 class="banner-title">Life of PI</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet, libero
									ipsum enim pharetra hac. Urna commodo, lacus ut magna velit eleifend. Amet, quis
									urna, a eu.</p>
								<form action="add_to_cart.php" method="POST">
									<input type="hidden" name="title" value="Life of PI">
									<input type="hidden" name="author" value="Yann Martel">
									<input type="hidden" name="price" value="25.00">
									<button type="submit">+ Add to Cart</button>
								</form>
							</div><!--banner-content-->
							<img src="images/main-banner1.jpg" alt="banner" class="banner-image">
						</div><!--slider-item-->


				</div>
			</div>
		</div>

	</section>

	<section id="client-holder" data-aos="fade-up">
		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="logo-wrap">
						<div class="grid">
							<a href="#"><img src="images/client-image1.png" alt="client"></a>
							<a href="#"><img src="images/client-image2.png" alt="client"></a>
							<a href="#"><img src="images/client-image3.png" alt="client"></a>
							<a href="#"><img src="images/client-image4.png" alt="client"></a>
							<a href="#"><img src="images/client-image5.png" alt="client"></a>
						</div>
					</div><!--image-holder-->
				</div>
			</div>
		</div>
	</section>

	<section id="featured-books" class="py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>Some quality items</span>
						</div>
						<h2 class="section-title">This Weeks Selection</h2>
					</div>

					<div class="product-list" data-aos="fade-up">
						<div class="row">

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item1.jpg" alt="Books" class="product-item">
										<a href="add_to_cart.php?title=The%20Kite%20Runner&author=Khaled%20Hosseini&price=40.00"></a>
									</figure>
									<figcaption>
										<h3>The Kite Runner</h3>
										<span>Khaled Hosseini</span>
										<div class="item-price">$ 40.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="The Kite Runner">
												<input type="hidden" name="author" value="Khaled Hosseini">
												<input type="hidden" name="price" value="40.00">
												<button type="submit">+ Add to Cart</button>
											</form>
									</figcaption>

								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item2.jpg" alt="Books" class="product-item">
									</figure>
									<figcaption>
										<h3>The Seven Husbands of Evelyn Hugo</h3>
										<span>Taylor Jenkins Reid</span>
										<div class="item-price">$ 30.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="The Seven Husbands of Evelyn Hugo">
												<input type="hidden" name="author" value="Taylor Jenkins Reid">
												<input type="hidden" name="price" value="30.00">
												<button type="submit">+ Add to Cart</button>
											</form>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item3.jpg" alt="Books" class="product-item">
										
									</figure>
									<figcaption>
										<h3>A Thousand Splendid Suns</h3>
										<span>Khaled Hosseini</span>
										<div class="item-price">$ 25.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="A Thousand Splendid Suns">
												<input type="hidden" name="author" value="Khaled Hosseini">
												<input type="hidden" name="price" value="25.00">
												<button type="submit">+ Add to Cart</button>
											</form>
									</figcaption>
								</div>
							</div>

							<div class="col-md-3">
								<div class="product-item">
									<figure class="product-style">
										<img src="images/product-item4.jpg" alt="Books" class="product-item">
										<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
											Cart</button>
									</figure>
									<figcaption>
										<h3>To Kill A Mockingbird</h3>
										<span>Gregory Peck</span>
										<div class="item-price">$ 30.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="To Kill A Mockingbird">
												<input type="hidden" name="author" value="Gregory Peck">
												<input type="hidden" name="price" value="30.00">
												<button type="submit">+ Add to Cart</button>
											</form>
									</figcaption>
								</div>
							</div>

						</div><!--ft-books-slider-->
					</div><!--grid-->


				</div><!--inner-content-->
			</div>
		</div>
	</section>

	<section id="best-selling" class="leaf-pattern-overlay">
		<div class="corner-pattern-overlay"></div>
		<div class="container">
			<div class="row justify-content-center">

				<div class="col-md-8">

					<div class="row">

						<div class="col-md-6">
							<figure class="products-thumb">
								<img src="images/single-image.jpg" alt="book" class="single-image">
							</figure>
						</div>

						<div class="col-md-6">
							<div class="product-entry">
								<h2 class="section-title divider">Best Selling Book</h2>

								<div class="products-content">
									<div class="author-name">By award winning author JK Rowling</div>
									<h3 class="item-title">Harry Potter and the Sorcerers Stone</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu feugiat amet,
										libero ipsum enim pharetra hac.</p>
									<div class="item-price">$ 25.00</div>
										<form action="add_to_cart.php" method="POST">
											<input type="hidden" name="title" value="Harry Potter and the Sorcerers Stone">
											<input type="hidden" name="author" value="JK Rowling">
											<input type="hidden" name="price" value="25.00">
											<button type="submit">+ Add to Cart</button>
										</form>
								</div>

							</div>
						</div>

					</div>
					<!-- / row -->

				</div>

			</div>
		</div>
	</section>

	<section id="popular-books" class="bookshelf py-5 my-5">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="section-header align-center">
						<div class="title">
							<span>This Weeks Availability</span>
						</div>
						<h2 class="section-title">Popular Books</h2>
					</div>

					<ul class="tabs">
						<li data-tab-target="#all-genre" class="active tab">All Genre</li>
						<li data-tab-target="#business" class="tab">Business</li>
						<li data-tab-target="#technology" class="tab">Technology</li>
					</ul>

					<div class="tab-content">
						<div id="all-genre" data-tab-content class="active">
							<div class="row">

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item1.jpg" alt="Books" class="product-item">
										</figure>
										<figcaption>
											<h3>The Innovators</h3>
											<span>Walter Isaacson</span>
											<div class="item-price">$ 18.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="The Innovators">
												<input type="hidden" name="author" value="Walter Isaacson">
												<input type="hidden" name="price" value="18.00">
												<button type="submit">+ Add to Cart</button>
											</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item2.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Rich Dad Poor Dad</h3>
											<span>Robert Kiyosaki</span>
											<div class="item-price">$ 10.00</div>
												<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Rich Dad Poor Dad">
													<input type="hidden" name="author" value="Robert Kiyosaki">
													<input type="hidden" name="price" value="10.00">
													<button type="submit">+ Add to Cart</button>
 												 </form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item3.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Hooked: How to Build Habit-Forming Products</h3>
											<span>Nir Eyal</span>
											<div class="item-price">$ 12.00</div>
												<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="Hooked: How to Build Habit-Forming Products">
												<input type="hidden" name="author" value="Nir Eyal">
												<input type="hidden" name="price" value="12.00">
												<button type="submit">+ Add to Cart</button>
											</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item4.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Think and Grow Rich</h3>
											<span>Napolean Hill</span>
											<div class="item-price">$ 8.00</div>
												<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Think and Grow Rich">
													<input type="hidden" name="author" value="Napolean Hill">
													<input type="hidden" name="price" value="8.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

							</div>
							<div class="row">

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item5.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>AI Superpowers</h3>
											<span>Kai-Fu Lee</span>
											<div class="item-price">$ 14.00</div>
											<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="AI Superpowers">
													<input type="hidden" name="author" value="Kai-Fu Lee">
													<input type="hidden" name="price" value="14.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item6.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Good to great</h3>
											<span>Jim Collins</span>
											<div class="item-price">$ 16.00</div>
											<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Good to great">
													<input type="hidden" name="author" value="Jim Collins">
													<input type="hidden" name="price" value="16.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item7.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>The Notebook</h3>
											<span>Nicholas Sparks</span>
											<div class="item-price">$ 10.00</div>
											<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="The Notebook">
													<input type="hidden" name="author" value="Nicholas Sparks">
													<input type="hidden" name="price" value="10.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item8.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>The Great Gatsby</h3>
											<span>F. Scott Fitzgerald </span>
											<div class="item-price">$ 15.00</div>
											<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="The Great Gatsby">
													<input type="hidden" name="author" value="F. Scott Fitzgerald">
													<input type="hidden" name="price" value="15.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

							</div>

						</div>
						<div id="business" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item2.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Rich Dad Poor Dad</h3>
											<span>Robert Kiyosaki</span>
											<div class="item-price">$ 10.00</div>
												<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Rich Dad Poor Dad">
													<input type="hidden" name="author" value="Robert Kiyosaki">
													<input type="hidden" name="price" value="10.00">
													<button type="submit">+ Add to Cart</button>
 												 </form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item4.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Think and Grow Rich</h3>
											<span>Napolean Hill</span>
											<div class="item-price">$ 8.00</div>
												<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Think and Grow Rich">
													<input type="hidden" name="author" value="Napolean Hill">
													<input type="hidden" name="price" value="8.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item6.jpg" alt="Books" class="product-item">
											
										</figure>
										<figcaption>
											<h3>Good to great</h3>
											<span>Jim Collins</span>
											<div class="item-price">$ 16.00</div>
											<form action="add_to_cart.php" method="POST">
													<input type="hidden" name="title" value="Good to great">
													<input type="hidden" name="author" value="Jim Collins">
													<input type="hidden" name="price" value="16.00">
													<button type="submit">+ Add to Cart</button>
												</form>
										</figcaption>
									</div>
								</div>

								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item8.jpg" alt="Books" class="product-item">
											<button type="button" class="add-to-cart" data-product-tile="add-to-cart">Add to
												Cart</button>
										</figure>
										<figcaption>
											<h3>Simple way of piece life</h3>
											<span>Armor Ramsey</span>
											<div class="item-price">$ 40.00</div>
										</figcaption>
									</div>
								</div>

							</div>
						</div>

						<div id="technology" data-tab-content>
							<div class="row">
								<div class="col-md-3">
									<div class="product-item">
										<figure class="product-style">
											<img src="images/tab-item1.jpg" alt="Books" class="product-item">
										</figure>
										<figcaption>
											<h3>The Innovators</h3>
											<span>Walter Isaacson</span>
											<div class="item-price">$ 18.00</div>
											<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="The Innovators">
												<input type="hidden" name="author" value="Walter Isaacson">
												<input type="hidden" name="price" value="18.00">
												<button type="submit">+ Add to Cart</button>
											</form>
										</figcaption>
									</div>
								</div>
							</div>
						</div>

					</div>

				</div><!--inner-tabs-->

			</div>
		</div>
	</section>

	<section id="quotation" class="align-center pb-5 mb-5">
		<div class="inner-content">
			<h2 class="section-title divider">Quote of the day</h2>
			<blockquote data-aos="fade-up">
				<q>“All men dream, but not equally. Those who dream by night in the dusty recesses of their minds wake in the day to find it was vanity; but the dreamers of the day are dangerous men, for they may act on their dreams with open eyes, to make them possible.”</q>
				<div class="author-name">T.E. Lawrence</div>
			</blockquote>
		</div>
	</section>

	<section id="special-offer" class="bookshelf pb-5 mb-5">

		<div class="section-header align-center">
			<div class="title">
				<span>Grab your opportunity</span>
			</div>
			<h2 class="section-title">Books with offer</h2>
		</div>

		<div class="container">
			<div class="row">
				<div class="inner-content">
					<div class="product-list" data-aos="fade-up">
						<div class="grid product-grid">
							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item5.jpg" alt="Books" class="product-item">
								</figure>
								<figcaption>
									<h3>The Alchemist</h3>
									<span>Paul Coelho</span>
									<div class="item-price">
										<span class="prev-price">$ 40.00</span>$ 30.00
									</div>
								</div>
								
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item6.jpg" alt="Books" class="product-item">
								</figure>
								<figcaption>
									<h3>Atomic Habits</h3>
									<span>James Clear</span>
									<div class="item-price">
										<span class="prev-price">$ 35.00</span>$ 25.00
									</div>
								</div>
							
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item7.jpg" alt="Books" class="product-item">
								</figure>
								<figcaption>
									<h3>Where the crawdads sing</h3>
									<span>Delia Owens</span>
									<div class="item-price">
										<span class="prev-price">$ 30.00</span>$ 20.00
									</div>
								</div>
								<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="Where the crawdads sing">
												<input type="hidden" name="author" value="Delia Owens">
												<input type="hidden" name="price" value="20.00">
												<button type="submit">+ Add to Cart</button>
											</form>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item8.jpg" alt="Books" class="product-item">
								</figure>
								<figcaption>
									<h3>The Midnight Library</h3>
									<span>Matt Haig</span>
									<div class="item-price">
										<span class="prev-price">$ 25.00</span>$ 15.00
									</div>
								</div>
								<form action="add_to_cart.php" method="POST">
												<input type="hidden" name="title" value="The Midnight Library">
												<input type="hidden" name="author" value="Matt Haig">
												<input type="hidden" name="price" value="15.00">
												<button type="submit">+ Add to Cart</button>
											</form>
							</figcaption>

							<div class="product-item">
								<figure class="product-style">
									<img src="images/product-item2.jpg" alt="Books" class="product-item">
									
								</figure>
								<figcaption>
									<h3>Simple way of piece life</h3>
									<span>Armor Ramsey</span>
									<div class="item-price">$ 40.00</div>
								</figcaption>
							</div>
						</div><!--grid-->
					</div>
				</div><!--inner-content-->
			</div>
		</div>
	</section>


	

	
	
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="js/plugins.js"></script>
	<script src="js/script.js"></script>

</body>
<?php include "templates/footer.php"; ?>
</html>