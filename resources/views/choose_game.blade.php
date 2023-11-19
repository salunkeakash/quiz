@extends('layout.app')


@section('content')
    <div class="pageBody">
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-6">
                        <a href="/sector/1">
                            <div class="infoBox mb-4">
                                <div class="infoContent">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ asset('assets/images/circle-timer.svg')}}" alt="" class="iconImg">
                                        <h5 class="mb-0">Win it in 2 minutes!</h5>
                                    </div>
                                    <p class="mb-0 smallTxt">Unlock your career path through our easy career assessment
                                        test and
                                        stand to win vouchers of up to Rs <b>5000</b>.</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/sector/2">
                            <div class="infoBox mb-4">
                                <div class="infoContent">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ asset('assets/images/circle-job.svg')}}" alt="" class="iconImg">
                                        <h5 class="mb-0">Are you job ready?</h5>
                                    </div>
                                    <p class="mb-0 smallTxt">Know where you stand before you enter the job market
                                        through a simple
                                        TimesPro
                                        AI powered test</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </section>
        <section class="bottomGraphic"></section>
    </div>
@endsection
