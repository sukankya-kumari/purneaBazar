
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
       
        <div class="carousel-controls">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    style="background-image: url('../images/img2.jpg')"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    style="background-image: url('../images/img2.jpg')"></li>
                <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    style="background-image: url('../images/img2.jpg')"></li>
            </ol>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
           
                <img src="{{asset('images/img2.jpg')}}" alt="" width="100%" height="250px">

                <div class="container">
                  
                  
                </div>
            </div>
            
            <div class="carousel-item">
                <img src="{{asset('images/img2.jpg')}}" alt="" width="100%" height="250px">

                <div class="container">
                    <h2>Pedicure and manicure</h2>
                </div>
            </div>

            <div class="carousel-item">
                <img src="{{asset('images/img2.jpg')}}" alt="" width="100%" height="250px">
            </div>
        </div>

    </div>
    @yield('des')