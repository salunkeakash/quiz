@extends('layout.app')

@section('title', $title)
@section('content')
    <div class="pageBody">
        <section>
            <div class="container homeBanner pt-4 pb-5 text-center">
                <h1 class="text-uppercase fw-normal text-center">Play Smart, <span class="colorRed fw-bold d-block">Win
                        Big!</span></h1>
                <img src="{{ asset('assets/images/banner-img.png')}}" alt="" />
                <a href="/choose-you-game"><button class="blueBtn bigFontBtn w-100 d-block m-auto">Start
                        Game</button></a>
            </div>
        </section>

        <section class="learnerSection pt-5 margin_custom">
            <div class="redBg mt-5 mt-md-5 pb-5">
                <h2 class="title pb-3">Learner Voice</h2>
                <div class="container">
                    <div class="customSlider">
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <!-- <button class="videoBtn"><img src="assets/images/play-btn.png" /></button>
                                    <video height="auto" preload="metadata" onclick="videoControls(this);return false;">
                                        <source type="video/mp4" src="https://www.w3schools.com/html/mov_bbb.mp4#t=0.1">
                                    </video> -->
                                <iframe width="100%" height="200px" width="100%"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <iframe width="100%" height="200px"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                        <div class="slide-item">
                            <div class="videoPlayer mb-2">
                                <iframe width="100%" height="200px"
                                    src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                    frameborder="0" allowfullscreen>
                                </iframe>
                            </div>
                            <span class="smallLabel">Sector</span>
                            <div class="py-3">
                                <p class="mb-0 cardName">Akash Singh</p>
                                <small>Microsoft, Sr. Software Engineer</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="whiteBg text-center pt-5 pb-3">
            <div class="container">
                <h2 class="title pb-3">Why TimesPro?</h2>
                <div class="customSlider blueDots">
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                    <div class="slide-item">
                        <div class="videoPlayer mb-2">
                            <iframe width="100%" height="200px"
                                src="https://www.youtube.com/embed/v3dJmCrsN3o?si=vwvUhLJb4ZRtYyMq?showinfo=0"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
