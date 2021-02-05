<div class="row">

<div class="col-md-6 col-lg-4 col-xl-4">
            <div class="blog-box">
                <div class="blog-img">
                    <img class="img-fluid" src="{{asset('images/')}}/{{$product->image}}" alt="" />
                </div>
                <div class="blog-content">
                    <div class="title-blog">
                        <p href="">{{$product->name}}</p>
                        <p>{{$product->short_description}}</p>
                    </div>
                    <ul class="option-blog">
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Likes"><i class="far fa-heart"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Views"><i class="fas fa-eye"></i></a></li>
                        <li><a href="#" data-toggle="tooltip" data-placement="right" title="Comments"><i class="far fa-comments"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
</div>
