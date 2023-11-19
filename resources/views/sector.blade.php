@extends('layout.app')


@section('content')
<div class="pageBody">
    <section>
        <div class="container py-5">
            <p class="smallTxt mb-4">To begin, first select the sector of your choice</p>
            <div class="row">
                <div class="col-md-6">
                    <a href="/details_form/1">
                        <div class="infoBox mb-4">
                            <div class="infoContent">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/circle-bfsi.svg')}}" alt="" class="iconImg">
                                    <h6 class="mb-0">BFSI</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/details_form/2">
                        <div class="infoBox mb-4">
                            <div class="infoContent">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/circle-logistics.svg')}}" alt="" class="iconImg">
                                    <h6 class="mb-0">Logistics, E-commerce & Supply Chain</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/details_form/3">
                        <div class="infoBox mb-4">
                            <div class="infoContent">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/circle-IT.svg')}}" alt="" class="iconImg">
                                    <h6 class="mb-0">Information Technology</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="/details_form/4">
                        <div class="infoBox mb-4">
                            <div class="infoContent">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/images/circle-hospitality.svg')}}" alt="" class="iconImg">
                                    <h6 class="mb-0">Hospitality & Hotel Management</h6>
                                </div>
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
