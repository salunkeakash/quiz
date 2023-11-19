@extends('layout.app')

@section('content')
    <div class="pageBody">
        <section>
            <div class="scoreBoard">
                <h2 class="fw-normal">Hey {{$user[0]->name}}!!!</span></h2>
                <div class="scoreCircle my-5">
                    <p class="mb-0">Your Score</p>
                    <span>{{$quiz[0]->correct}}</span>
                    <div class="animateCircle" style="animation-delay: 0s"></div>
                    <div class="animateCircle" style="animation-delay: 0.5s"></div>
                    <!-- <div class="animateCircle" style="animation-delay: 1s"></div> -->
                </div>
                <div class="row gx-3 mb-4 justify-content-center">
                    <div class="col col-md-2">
                        <div class="scoreDetails">
                            <p class="smallTxt mb-0">Question</p>
                            <span>10</span>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="scoreDetails">
                            <p class="smallTxt mb-0">Correct</p>
                            <span>{{$quiz[0]->correct}}</span>
                        </div>
                    </div>
                    <div class="col col-md-2">
                        <div class="scoreDetails">
                            <p class="smallTxt mb-0">Wrong</p>
                            <span>{{$quiz[0]->wrong}}</span>
                        </div>
                    </div>
                </div>
                @if ($quiz[0]->workflow == 1)
                       <p class="voucherTxt">You have won discount voucher of </br><span class="fw-normal">₹</span><span>
                        {{$quiz[0]->prize}}/-</span></p>
                        @else
                        <p class="voucherTxt">&nbsp;  <br> </p>
                @endif

            </div>
            @if ($quiz[0]->workflow == 1)
            <div class="container pt-4 pb-5 text-center">
                <p>Now that you've won, reach out to your nearest advisor to claim your rewards</p>
                <div class="voucherCode mb-4">
                    {{$quiz[0]->voucher_code}}
                </div>
                <a href="#">
                    <button class="blueBtn w-100 mb-3">Claim</button>
                </a>
                <a href="/">
                    <button class="blueBtn blueLineBtn w-100">Play again to improve your score</button>
                </a>
            </div>
            @else
            <div class="container pt-4 pb-5 text-center">
                <p class="voucherTxt">{{$quiz[0]->msg}}</p>
                <a href="/">
                    <button class="blueBtn blueLineBtn w-100">Play again to improve your score</button>
                </a>
            </div>
            @endif
        </section>

        <section class="learnerSection pt-5">
            <div class="redBg mt-4 mt-md-5 pb-5">
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
