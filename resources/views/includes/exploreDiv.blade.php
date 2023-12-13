<div class=" col-md-4 col-sm-6">
    <div class="single-explore-item">
        <div class="single-explore-img">
            <img src="{{asset('assets/images/upload/'.$row["image"])}}" alt="explore image">
            <div class="single-explore-img-info">
                <button onclick="window.location.href='#'">best rated</button>
                <div class="single-explore-image-icon-box">
                    <ul>
                        <li>
                            <div class="single-explore-image-icon">
                                <i class="fa fa-arrows-alt"></i>
                            </div>
                        </li>
                        <li>
                            <div class="single-explore-image-icon">
                                <i class="fa fa-bookmark-o"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-explore-txt bg-theme-1">
            <h2><a href="#">{{$row['imageTitle']}}</a></h2>
            <p class="explore-rating-price">
                <span class="explore-rating">5.0</span>
                <a href="#"> 10 ratings</a> 
                <span class="explore-price-box">
                    form
                    <span class="explore-price">{{$row['from']}}$-{{$row['to']}}$</span>
                </span>
                 <a href="#">resturent</a>
            </p>
            <div class="explore-person">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="explore-person-img">
                            <a href="#">
                                <img src="assets/images/explore/person.png" alt="explore person">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <p>
                            {{$row['shortDescription']}}												</p>
                    </div>
                </div>
            </div>
            <div class="explore-open-close-part">
                <div class="row">
                    <div class="col-sm-5">
                        <button class="close-btn" onclick="window.location.href='#'">close now</button>
                    </div>
                    <div class="col-sm-7">
                        <div class="explore-map-icon">
                            <a href="#"><i data-feather="map-pin"></i></a>
                            <a href="#"><i data-feather="upload"></i></a>
                            <a href="#"><i data-feather="heart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>