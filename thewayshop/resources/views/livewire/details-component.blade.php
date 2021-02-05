<div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('images/')}}/{{$products->image}}" alt="First slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('images/')}}/{{$products->image}}" alt="Second slide"> </div>
                            <div class="carousel-item"> <img class="d-block w-100" src="{{asset('images/')}}/{{$products->image}}" alt="Third slide"> </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel-example-1" role="button" data-slide="prev"> 
						<i class="fa fa-angle-left" aria-hidden="true"></i>
						<span class="sr-only">Previous</span> 
					</a>
                        <a class="carousel-control-next" href="#carousel-example-1" role="button" data-slide="next"> 
						<i class="fa fa-angle-right" aria-hidden="true"></i> 
						<span class="sr-only">Next</span> 
					</a>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-1" data-slide-to="0" class="active">
                                <img class="d-block w-100 img-fluid" src="{{asset('images/')}}/{{$products->image}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="1">
                                <img class="d-block w-100 img-fluid" src="{{asset('images/')}}/{{$products->image}}" alt="" />
                            </li>
                            <li data-target="#carousel-example-1" data-slide-to="2">
                                <img class="d-block w-100 img-fluid" src="{{asset('images/smp-img-03.jpg')}}/{{$products->image}}" alt="" />
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2>{{$products->name}}</h2>
                        <h5>{{$products->regular_price}}</h5>
                        <p class="available-stock">{{$products->stock_status}}<span> More than {{$products->quantity}} available / <a href="#">8 sold </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p>{{$products->short_description}}</p>
                                <ul>
                                    <li>
                                        <div class="form-group size-st">
                                            <label class="size-label">Size</label>
                                            <select id="basic" class="selectpicker show-tick form-control">
                                                <option value="0">Size</option>
                                                <option value="0">S</option>
                                                <option value="1">M</option>
                                                <option value="1">L</option>
                                                <option value="1">XL</option>
                                                <option value="1">XXL</option>
                                                <option value="1">3XL</option>
                                                <option value="1">4XL</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-group quantity-box">
                                            <label class="control-label">Quantity</label>
                                            <input class="form-control" value="0" min="0" max="20" type="number">
                                        </div>
                                    </li>
                                </ul>

                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover" data-fancybox-close="" href="#">Buy New</a>
                                        <a class="btn hvr-hover" data-fancybox-close="" href="#" wire:click.prevent="store({{$products->id}},'{{$products->name}}',{{$products->regular_price}})">Add to cart</a>
                                    </div>
                                </div>

                                <div class="add-to-btn">
                                    <div class="add-comp">
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-heart"></i> Add to wishlist</a>
                                        <a class="btn hvr-hover" href="#"><i class="fas fa-sync-alt"></i> Add to Compare</a>
                                    </div>
                                    <div class="share-bar">
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a>
                                        <a class="btn hvr-hover" href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div class="title-all text-center">
                            <h1>Featured Products</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                        </div>
                        <div class="row">
                        @foreach($popular_product as $p_product)
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                               <div class="item">
                                    <div class="products-single fix">                                        
                                        <div class="box-img-hover">
                                            <div class="type-lb">
                                                <p class="sale">Sale</p>
                                            </div>
                                            <a href="{{route('product.details',['slug'=>$p_product->slug])}}"><img src="{{asset('images/')}}/{{$p_product->image}}" class="img-fluid" alt="{{$p_product->name}}"></a>
                                            <div class="mask-icon">
                                                <ul>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i class="fas fa-eye"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                                </ul>
                                                <button class="btn btn-danger" wire:click.prevent="store({{$p_product->id}},'{{$p_product->name}}',{{$p_product->regular_price}})">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="why-text">
                                        <a href="{{route('product.details',['slug'=>$p_product->slug])}}"><h4>{{$p_product->name}}</h4></a>
                                            <h5> {{$p_product->regular_price}}</h5>
                                        </div>
                                    </div>  
                               </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
          

    <!-- End Cart -->
    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                            <h4>About ThewayShop</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link">
                            <h4>Information</h4>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Customer Service</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                                <li><a href="#">Terms &amp; Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Delivery Information</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: Michael I. Days 3756 <br>Preston Street Wichita,<br> KS 67213 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+1-888705770">+1-888 705 770</a></p>
                                </li>
                                <li>
                                    <p><i class="fas fa-envelope"></i>Email: <a href="mailto:contactinfo@gmail.com">contactinfo@gmail.com</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->

    <!-- Start copyright  -->
    <div class="footer-copyright">
        <p class="footer-company">All Rights Reserved. &copy; 2018 <a href="#">ThewayShop</a> Design By :
            <a href="https://html.design/">html design</a></p>
    </div>
    <!-- End copyright  -->

    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- ALL PLUGINS -->
    <script src="{{asset('js/jquery.superslides.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script src="{{asset('js/inewsticker.js')}}"></script>
    <script src="{{asset('js/bootsnav.js.')}}"></script>
    <script src="{{asset('js/images-loded.min.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/baguetteBox.min.js')}}"></script>
    <script src="{{asset('js/form-validator.min.js')}}"></script>
    <script src="{{asset('js/contact-form-script.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>