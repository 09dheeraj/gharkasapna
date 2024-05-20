@extends('gharkasapna.layouts.innerpages_app')
@section('content')


<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap');

    .form-check-input {
        display: none;
    }

    input[type="radio"][disabled]+label {
        cursor: not-allowed;
        color: #ccc;
        /* Change color as per your design */
        /* Add any additional styling you want for disabled radio buttons */
    }

    p.img-ms {
        font-size: 19px;
        color: #181a20;
        align-items: center;
        text-align: center;
        font-family: 'Merriweather';
        padding: 2px;
        margin: 2px;
    }

    p.video-msg {
        text-align: center;
        font-size: 20px;
        font-family: 'flaticon';
    }

    /* Style for the custom radio button */
    .form-check-label {
        display: inline-block;
        cursor: pointer;
        padding: 6px 16px;
        border: 1px solid #f68121;
        border-radius: 6px;
        margin-right: -26px !important;
        background-color: #f6812133;
        color: #f68121;
    }

    .margin-left-techo {

        margin-left: -22px
    }

    .form-control {
        background-color: #F5F2E9;
        height: 42px !important;
        width: 100%;
    }

    /* Style for the selected radio button */
    .form-check-input:checked+.form-check-label {
        background-color: #f68121;
        color: #fff;
    }

    .mandatoryMarker {
        color: red;
        font-size: 24px;
        font-weight: 400;
        padding: 0 3px;
    }

    .error-card .modal-content {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }

    .error-card .modal-body {
        padding: 30px;
    }

    .error-card .modal-body p {
        margin: 0;
        font-size: 16px;
        color: #333;
    }

    .error-card .modal-body i {
        margin-right: 15px;
        font-size: 20px;
        color: #f00;
    }

    .post-property {
        color: red;
        text-align: center;
        font-size: 12px;
        font-style: inherit;
        font-weight: 600;
    }

    .custom-basic-title {
        font-size: 18px;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.7);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 80px auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }


    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* <-----new css -------> */

    :root {
        --title-font-family: "Roboto" !important;
        --text-color-light-grey: #252A2C !important;
    }


    .row-right {
        width: 50%;
    }

    .row-right .margin-left-techo {
        width: 50%
    }

    .row-left {
        width: 50%;
    }

    .row-left .margin-left-techo {
        width: 50%;
    }

    .form-control {
        border-radius: 6px !important;
        border: 1px solid #252a2ca6 !important;
        outline: 0 !important;
        border-bottom: 2px solid #252a2ca6 !important;
    }

    .form-check-label {
        background-color: #F5F2E9 !important;
    }

    .ps-widget.bgc-white.bdrs12.p30.overflow-hidden.position-relative {
        background-color: #F5F2E9;
        border-radius: 12px 12px 0 0;
        padding: 30px 30px 0 30px !important;
    }

    .second-section.mt20 {
        background-color: #F5F2E9;
        padding: 0px 30px 0px 30px;
    }

    .second-section.mt20 .form-check {
        padding-left: 0 !important;
        margin-right: 3.5em !important;
        margin-bottom: 1.3em !important;
    }

    .form-check {
        margin-right: 1.5em !important;
        margin-bottom: 1em;
    }

    .residential-property-type .d-flex {
        background: #F5F2E9;
    }

    button#continue-btn,
    button#continue-second {
        margin: 30px 0;
    }

    .form-check-label:hover {
        background: #E86822 !important;
        color: #fff;
        transition: all 0.3s;
    }

    .selection label {
        background: #F5F2E9 !important;
        border: 1px solid #252a2ca6;
    }

    .tab-content .mt20 {
        margin-top: 0 !important;
    }

    input#balconiesinput,
    input#bathinput {
        border: 1px solid #252a2ca6 !important;
        border-radius: 0 6px 6px 0 !important;
        width: 85px !important;
        outline: 0 !important;
        background: #F5F2E9 !important;
    }

    #inputFieldContainerbath button,
    #inputFieldContainerbalconies button {
        border: 1px solid #E86822 !important;
        background: #F5F2E9 !important;
    }

    #inputFieldContainerbath button i.fas.fa-check.blue-icon,
    #inputFieldContainerbalconies button i.fas.fa-check.blue-icon {
        color: #E86822 !important;

    }

    .form-check-inlined-none.selected-residential-sell-categories {
        display: inline;
    }

    .col-6.col-sm-6.mb25 {
        width: 100%;
    }

    .thirds-section {
        background-color: #F5F2E9;
        padding: 0px 30px 50px 30px;
        border-radius: 0 0 12px 12px;
    }

    .col-xl-12 .mb30 {
        margin-bottom: 0px !important;
    }

    .default-box-shadow2 {
        box-shadow: none !important;
    }

    button.btn.dropdown-toggle.btn-light {
        background-color: #F5F2E9;
        border: 1px solid #252a2ca6;
        outline: 0;
        border-bottom: 2px solid #252a2ca6;
    }

    .form-check-input:checked+.form-check-label {
        background-color: #E86822 !important;
    }

    .col-sm-4.col-xl-3.mb25.custom-display-inline {
        width: 50%;
    }

    .col-12.col-sm-12.mb25.commercial-property-section {
        width: 50%;
    }

    .second-section.mt20 .residential-property-section .form-check {
        padding-left: 0px !important;
        margin-right: 3em !important;

    }

    .commercial-property-type .col-sm-4.col-xl-4.mb25 {
        width: 50%;
    }

    .pg-living-section .col-sm-3.col-xl-3.mb25 {
        width: 50%;
    }

    .rent-selected .form-check {
        padding-left: 0 !important;
    }

    .rent-selected .price-column-width {
        width: 50% !important;
    }

    .col-md-12.thired-btn {
        padding-top: 25px;
    }

    .balconiesbuttone button,
    .bathbuttone button {
        border: 1px solid #252a2ca6;
        background: #F5F2E9 !important;
        height: 43px !important;
    }

    .upload-img .icon {
        font-size: 80px;
        color: #e868228c;
    }

    label#apartment-width {
        margin-left: 22px;
    }

    .wrapper .custom-basic-title.ff-heading.fw600.mb10 {
        font-size: 20px !important;
        font-weight: 600 !important;
        /* margin: 18px 0 28px 0 !important; */
        letter-spacing: 1px !important;
        font-family: "Merriweather", serif !important;
        padding: 20px 0;
        padding-right: calc(var(--bs-gutter-x)* 0.5);
        padding-left: calc(var(--bs-gutter-x)* 0.5);
    }

    .built-up-area-width {
        padding-left: 0 !important;
    }

    .ff-heading.fw600,
    .text-color-black.fw600.mb20 {
        font-size: 16px;
        font-weight: 500 !important;
    }

    h4.text-color-black.fz17.mb30 {
        font-size: 25px;
        /* font-family:var(--title-font-family) */
        font-family: "Merriweather", serif !important;
    }

    .row .mb20 {
        margin-bottom: 10px !important;
    }

    .commercial-property-section .form-check {
        margin-right: 1.1em !important;
    }

    .pb40 {
        padding-bottom: 0px !important;
    }

    .pt30 {
        padding-top: 0 !important;
    }

    .dashboard__content.property-page.post-property-page.bgc-f7 {
        padding: 0;
    }

    .col-sm-4.col-xl-3.mb25.custom-display-inline {
        width: 33%;
    }

    .col-sm-6.col-xl-6.mb25.building-width {
        width: 33%;
    }

    .residential-property-section .col-sm-6.col-xl-6.mb25.built-up-area-width {
        vertical-align: center !important;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .residential-property-type .col-sm-6.col-xl-4 {
        width: 28%;
    }

    .residential-property-type .col-sm-4.col-xl-4.mb25 {
        width: 42% !important;
    }

    /* a.ui-state-default.ui-state-highlight.ui-state-active {
        background: red;
        color: #F5F2E9;

    } */

    div#ui-datepicker-div {
        background-color: #F5F2E9;
        border: 1px solid #646464;
        border-radius: 6px;
    }

    .ui-datepicker-header.ui-widget-header.ui-helper-clearfix.ui-corner-all {
        background: #f68121 !important;
        color: #fff;
    }

    span.ui-icon.ui-icon-circle-triangle-w,
    span.ui-icon.ui-icon-circle-triangle-e {
        background: #f5f2e9;
        color: #000 !important;
    }

    div#ui-datepicker-div {
        width: 36%;
    }

    .ui-datepicker-week-end span {
        font-size: 15px;
        letter-spacing: 0px;
        font-family: 'Roboto';
    }

    button.ui-datepicker-close.ui-state-default.ui-priority-primary.ui-corner-all,
    button.ui-datepicker-current.ui-state-default.ui-priority-secondary.ui-corner-all {
        border: 1px solid #f68121;
        color: #f68121;
        font-weight: 600 !important;
    }

    .ui-datepicker-calendar th {
        background-color: #0000008f;
        color: #fff;
    }

    a.ui-state-default {
        border: 1px solid #f68121a1 !important;
    }

    a.ui-state-default {
        width: 100%;
        display: flex;
        justify-content: center;
        padding: 0 45% !important;
    }

    .ui-state-active,
    .ui-widget-content .ui-state-active {
        background-color: #E86822 !important;
        color: #fff !important;
    }

    .ui-state-highlight,
    .ui-widget-content .ui-state-highlight {
        background-color: #f6812194 !important;
        color: #fff;
    }

    .col-sm-6.col-xl-6.mb25.zone-width {
        width: 62%;
    }

    .col-sm-6.col-xl-6.mb25.location-hub-width {
        width: 38%;

    }

    .rent-selected .col-sm-3.col-xl-3.mb25 {
        width: 33.33%;
    }

    .thirds-section .rent-selected .price-column-width {
        width: 33% !important;
    }

    .thirds-section .price-column-width .form-check-inline {
        margin-right: 3em !important;
    }

    .bathroom-section-width {
        width: 29% !important;
    }

    .preview-image {
        width: 295px;
        height: 200px;
        border: 3px solid #e86822;
        border-radius: 5px;
        box-shadow: 0 0 10px #e8682280;
        position: relative;
    }

    .preview-image:hover {
        transform: scale(1.1);
        filter: drop-shadow(0px 0px 6px #e86822);
        transition: all 0.3s;
        cursor: pointer;

    }

    .image-preview-space {
        display: flex;
        justify-content: start;
        align-items: center;
        flex-wrap: wrap;
        gap: 50px;
    }

    .preview-image img {
        width: 100%;
        height: 100%;
        border-radius: 2px;
    }

    .preview-image i.fa-solid.fa-trash {
        background: #f5f2e9;
        width: 45px;
        text-align: center;
        height: 30px;
        border-radius: 6px;
        position: absolute;
        left: 15px;
        top: 15px;
    }

    .preview-image i.fa-solid.fa-trash:hover {
        background: #F68121;
        color: #f5f2e9;
        transition: all 0.3s;

    }

    .imagescale {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
    }

    #overlay0box {
        position: absolute;
        top: 0;
        z-index: 100;
        left: 0;
        background-color: #000;
    }

    div#discriptions {
        width: 100%;
    }

    textarea#discription {
        height: 160px !important;
    }

    input#property-name {
        height: 60px !important;
        font-style: italic;
        font-size: large;
    }
</style>

<div id="overlay-box">

</div>
<div class="wrapper ovh">
    <div class="preloader"></div>


    <div class="dashboard__main_custom pl0-md">
        <div class="dashboard__content property-page post-property-page bgc-f7">
            <div class="row pb40 d-block d-lg-none"> </div>
            <div class="row align-items-center pb40">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        @php $propertyName = substr($propertiesData->property_name, 0, strrpos($propertiesData->property_name, ' ')); @endphp

                        <h2>{{$propertiesData->looking_to == 'pg' ? $propertiesData->pg_name : $propertyName}}</h2>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            @if(session('success'))

            <div class="col-lg-6 success-mesg">
                <div class="ui-content">
                    <div class="message-alart-style1">
                        <div class="alert alart_style_four alert-dismissible fade show mb20" role="alert">Success: {{ session('success') }}
                            <i class="far fa-xmark btn-close" data-bs-dismiss="alert" aria-label="Close"></i>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            <div class="modal fade" id="error-card-toggle" aria-hidden="true" aria-labelledby="error-card-toggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="log-reg-form">
                                <div class="navtab-style2">
                                    <div class="tab-content" id="nav-tabContent2">
                                        <div class="tab-pane fade show active fz15" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="first-section mt20">
                <form action="{{route('update.property')}}" method="post" id="property-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="ps-widget bgc-white bdrs12 default-box-shadow2 pt30 mb30 overflow-hidden position-relative">
                                <div class="navtab-style1">
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                                            <div class="ff-heading fw600 mb10 custom-basic-title">Add Basic Details</div>
                                            <hr>
                                            <!-- form tag -->
                                            <div class="row">
                                                <div class="row-left">
                                                    <div class="ff-heading fw600 mb10">Property Type <span class="mandatoryMarker">*</span></div>

                                                    <div class="row">

                                                        <div class="col-xl-4 col-sm-4 mb25 margin-left-techo">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="residential-radio" name="property_type" value="residential" {{$propertiesData->property_type == 'residential' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="residential-radio">Residential</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" id="commercial-radio" name="property_type" value="commercial" {{$propertiesData->property_type == 'commercial' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="commercial-radio">Commercial</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row-right">

                                                    <div class="ff-heading text-color-black fw600 mb20">Looking to<span class="mandatoryMarker">*</span></div>

                                                    <div class="col-xl-4 col-sm-4 mb25 margin-left-techo">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="looking_to" value="rent" id="rent-radio" {{$propertiesData->looking_to == 'rent' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="rent-radio">Rent</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="looking_to" value="sell" id="sell-radio" {{$propertiesData->looking_to == 'sell' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="sell-radio">Sell</label>
                                                        </div>
                                                        <div class="form-check form-check-inline pg-section">
                                                            <input class="form-check-input" type="radio" name="looking_to" value="pg" id="pg-living" {{$propertiesData->looking_to == 'pg' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="pg-living">PG/Co-living</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="row">

                                                <div class="col-sm-4 col-xl-3 mb25 custom-display-inline">
                                                    <div class="location-area">
                                                        <label for="phone" class="ff-heading fw600 mb20">Search City<span class="mandatoryMarker">*</span></label>
                                                        <span id="alerterrorsearch_city" class="post-property"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="search_city" id="search-city" placeholder="Search City" value="{{$propertiesData->city}}">
                                                    <input type="hidden" name="property_id" value="{{$propertiesData->id}}">
                                                </div>
                                                <div class="col-sm-6 col-xl-6 mb25 building-width">
                                                    <div class="location-area">
                                                        <label for="phone" class="ff-heading fw600 mb10">Building/Project/Society <span class="mandatoryMarker">*</span></label><br>
                                                        <span id="alerterrorproject_society" class="post-property"></span>

                                                    </div>
                                                    <input type="text" class="form-control" name="project_society" id="building-project" placeholder="Building/Project/Society" value="{{$propertiesData->project_society}}">
                                                </div>

                                                <div class="col-sm-6 col-xl-6 mb25 building-width">
                                                    <div class="location-area">
                                                        <label for="phone" class="ff-heading fw600 mb10">Locality <span class="mandatoryMarker">*</span></label><br>
                                                        <span id="alerterrorlocality" class="post-property"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="locality" id="Locality" placeholder="Locality" value="{{$propertiesData->locality}}">
                                                </div>


                                                <div class="col-sm-12 col-xl-12 mb25 building-width {{$propertiesData->looking_to == 'pg' ? 'd-none' : ''}}" id="input-proprty-name">
                                                    <div class="location-area">
                                                        <label for="phone" class="ff-heading fw600 mb10">Property Name <span class="mandatoryMarker">*</span></label><br>
                                                        <span id="alerterrorlocality" class="post-property"></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="property_name" id="property-name" placeholder="Enter Property name" value="{{$propertiesData->property_name}}">
                                                </div>


                                            </div>



                                            <!-- first tab pg -section -->
                                            <div class="pg-living-section {{$propertiesData->looking_to == 'pg' ? '' : 'd-none'}}">
                                                <div class="row">
                                                    <div class="fw600 mb10 custom-basic-title">PG DETAILS</div>
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">PG Name<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorpg_name" class="post-property"></span>
                                                        </div>
                                                        <input type="text" class="form-control" name="pg_name" id="pg-name" placeholder="PG Name" value="{{$propertiesData->pg_name}}">
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Total Beds<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrortotal_beds" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" name="total_beds" id="total-beds" placeholder="Total Beds" value="{{$propertiesData->total_property}}">
                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">PG is for<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_for" value="girls" id="pg-girls" {{$propertiesData->pg_for == 'girls' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-girls">Girls</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_for" value="boys" id="pg-boys" {{$propertiesData->pg_for == 'boys' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-boys">Boys</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Best suited for<span class="mandatoryMarker">*</span></label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_suited_for" value="students" id="suited-students" {{$propertiesData->suited_for == 'students' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="suited-students">Students</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_suited_for" value="professionals" id="suited-professionals" {{$propertiesData->suited_for == 'professionals' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="suited-professionals">Professionals</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meals Available <span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_meals" value="yes" id="pg-meals-yes" {{$propertiesData->meals_available == 'yes' ? 'checked' : ''}}>
                                                            <label for="pg-meals-yes" class="form-check-label fw600">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_meals" value="no" id="pg-meals-no" {{$propertiesData->meals_available == 'no' ? 'checked' : ''}}>
                                                            <label for="pg-meals-no" class="form-check-label fw600">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 secled-meals-yes ">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meal Offerings<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        @php $mealOfferings = explode(',', $propertiesData->meal_offerings); @endphp
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="breakfast" id="breakfast" {{ in_array('breakfast', $mealOfferings) ? 'checked' : '' }}>
                                                            <label class="form-check-label fw600" for="breakfast">Breakfast</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="lunch" id="lunch" {{ in_array('lunch', $mealOfferings) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="lunch">Lunch</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_offerings[]" value="dinner" id="dinner" {{ in_array('dinner', $mealOfferings ) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="dinner">Dinner</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 secled-meals-yes ">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Meal Speciality (Optional)<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        @php $mealSpeciality = explode(',', $propertiesData->meal_speciality); @endphp
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="punjabi" id="punjabi" {{in_array('punjabi', $mealSpeciality) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="punjabi">Punjabi</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="south indian" id="south-indian" {{in_array('south indian', $mealSpeciality) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="south-indian">South Indian</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="andhra" id="andhra" {{in_array('andhra', $mealSpeciality) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="andhra">Andhra</label>
                                                        </div>


                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="meal_speciality[]" value="north indian" id="north-indian" {{in_array('north indian', $mealSpeciality) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="north-indian">North Indian</label>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10"> Notice Period (Days) <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrornotice_period" class="post-property"></span>

                                                        </div>
                                                        <input type="number" class="form-control" name="notice_period" id="notice-period" placeholder="Notice Period (Days)" value="{{$propertiesData->notice_period}}">
                                                        <span id="notice-period-display"></span>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Lock in Period (Days) <span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorlock_period" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" name="lock_period" id="lock-period" placeholder="Lock in Period (Days)" value="{{$propertiesData->lock_in_period}}">
                                                        <span id="lock-period-display"></span>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10">Common Areas <span class="mandatoryMarker">*</span></div>

                                                    <div class="col-sm-6 col-xl-12 mb25">
                                                        @php $commonAreas = explode(',', $propertiesData->common_areas); @endphp
                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="living-room" value="living room" {{in_array('living room', $commonAreas) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="living-room">Living Room</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="kitchen" value="kitchen" {{in_array('kitchen', $commonAreas) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="kitchen">Kitchen</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="dining-hall" value="dining hall" {{in_array('dining hall', $commonAreas) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="dining-hall">Dining Hall</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="study-library" value="study room library" {{in_array('study room library', $commonAreas) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="study-library">Study Room / Library</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" name="common_areas[]" id="breakout-room" value="breakout room" {{in_array('breakout room', $commonAreas) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="breakout-room">Breakout Room</label>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10 custom-basic-title">OWNER / CARETAKER DETAILS <span class="mandatoryMarker">*</span></div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Property Managed By</label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="landlord" id="landlord" {{$propertiesData->ownership == 'landlord' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="landlord">Landlord</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="caretaker" id="caretaker" {{$propertiesData->ownership == 'caretaker' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="caretaker">Caretaker</label>
                                                        </div>

                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" type="radio" name="owner_details" value="dedicated professional" id="dedicated-professional" {{$propertiesData->ownership == 'dedicated professional' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="dedicated-professional">Dedicated Professional</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Property Manager stays at Property <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="stays_property" value="yes" id="property-manger-yes" {{$propertiesData->stays == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="property-manger-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline ">
                                                            <input class="form-check-input" type="radio" name="stays_property" value="no" id="property-manger-no" {{$propertiesData->stays == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="property-manger-no">No</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="ff-heading fw600 mb10 custom-basic-title">PG RULES</div>
                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Non Veg Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_non_veg" value="yes" id="pg-non-vegYes" {{$propertiesData->rules_non_veg == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-non-vegYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_non_veg" value="no" id="pg-non-vegno" {{$propertiesData->rules_non_veg == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-non-vegno">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Opposite Sex Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_sex" value="yes" id="pg-sexYes" {{$propertiesData->rules_opposite_sex == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-sexYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_sex" value="no" id="pg-sexNo" {{$propertiesData->rules_opposite_sex == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-sexNo">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Any Time Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="pg_time_allowed" value="yes" id="any-timeYes" {{$propertiesData->rules_any_time == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="any-timeYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_time_allowed" value="no" id="any-timeNo" {{$propertiesData->rules_any_time == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="any-timeNo">No</label>
                                                        </div>
                                                    </div>



                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Visitors Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="visitors_allowed" value="yes" id="visitors-Yes" {{$propertiesData->rules_visitors == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="visitors-Yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="visitors_allowed" value="no" id="visitors-No" {{$propertiesData->rules_visitors == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="visitors-No">No</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4 col-xl-2 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Guardian Allowed<span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="guardian_allowed" value="yes" id="guardian-yes" {{$propertiesData->rules_guardian == 'yes' ? 'checked' : '' }}>
                                                            <label class="form-check-label fw600" for="guardian-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="guardian_allowed" value="no" id="guardian-no" {{$propertiesData->rules_guardian == 'no' ? 'checked' : '' }}>
                                                            <label class="form-check-label fw600" for="guardian-no">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Drinking - Smoking Allowed <span class="mandatoryMarker">*</span></label><br>
                                                        </div>


                                                        <div class="form-check form-check-inline margin-left-techo">
                                                            <input class="form-check-input" type="radio" name="drin_smok_allowed" value="yes" id="pg-smokingYes" {{$propertiesData->rules_drink_smok == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-smokingYes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="drin_smok_allowed" value="no" id="pg-smokingNo" {{$propertiesData->rules_drink_smok == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="pg-smokingNo">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="second-section mt20">

                                            <div class="ff-heading fw600 mb10 custom-basic-title {{$propertiesData->looking_to == 'pg' ? 'd-none' : ''}}">Add Property Details</div>
                                            <!--------------------------------- residential-property-type ------------------------>
                                            <div class="row residential-property-section {{$propertiesData->looking_to == 'pg' ? 'd-none' : ''}}">
                                                <div class="ff-heading fw600 mb10">Property Type <span class="mandatoryMarker">*</span></div>

                                                <div class="col-6 col-sm-6 mb25">
                                                    <div class="form-check form-check-inline margin-left-techo">
                                                        <input class="form-check-input" type="radio" name="category_type" value="apartment" id="apartment" {{$propertiesData->categories_type == 'apartment' ? 'checked' : 'disabled'}}>
                                                        <label class="form-check-label fw600" for="apartment" id="apartment-width">

                                                            <span>Apartment</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="category_type" value="independent floor" id="independent-floor" {{$propertiesData->categories_type == 'independent floor' ? 'checked' : 'disabled'}}>
                                                        <label class="form-check-label fw600" for="independent-floor">

                                                            <span>Independent Floor</span>
                                                        </label>
                                                    </div>


                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="category_type" value="independent house" id="independent-house" {{$propertiesData->categories_type == 'independent house' ? 'checked' : 'disabled'}}>
                                                        <label class="form-check-label fw600" for="independent-house">

                                                            <span>Independent House</span>
                                                        </label>
                                                    </div>

                                                    <div class="form-check-inline selected-residential-sell-categories">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="category_type" value="plot" id="plot-radio" {{$propertiesData->categories_type == 'plot' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="plot-radio">
                                                                <span>Plot</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-check-inline selected-residential-sell-categories">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="category_type" value="office" id="plot-radio" {{$propertiesData->categories_type == 'office' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="plot-radio">
                                                                <span>Office</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-check-inline selected-residential-sell-categories">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="category_type" value="retail shop" id="plot-radio" {{$propertiesData->categories_type == 'retail shop' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="plot-radio">
                                                                <span>Retail Shop</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-check-inline selected-residential-sell-categories">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="category_type" value="showroom" id="plot-radio" {{$propertiesData->categories_type == 'showroom' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="plot-radio">
                                                                <span>Showroom</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="form-check-inline selected-residential-sell-categories">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="category_type" value="warehouse" id="plot-radio" {{$propertiesData->categories_type == 'warehouse' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="plot-radio">
                                                                <span>Warehouse</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="row selected-residential-sell {{$propertiesData->categories_type == 'plot' ? '' : 'd-none'}}">
                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Plot Area<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorplot_area" class="post-property"></span>

                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Plot Area" name="plot_area" id="plot-area" value="{{$propertiesData->plot_area}}">
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb15">
                                                        <div class="mb20">
                                                            <label for="phone" class="ff-heading fw600 mb10">Area Unit</label><br>
                                                            <div class="location-area">
                                                                <select class="selectpicker" id="area-unit" name="area_unit">
                                                                    <option value="sqft" {{$propertiesData->carpet_area == 'sqft' ? 'selected' : ''}}>sq. ft.</option>
                                                                    <option value="sqyd" {{$propertiesData->carpet_area == 'sqyd' ? 'selected' : ''}}>sq. yd.</option>
                                                                    <option value="sqmt" {{$propertiesData->carpet_area == 'sqmt' ? 'selected' : ''}}>sq. mt.</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 {{($propertiesData->categories_type == 'plot' && $propertiesData->property_type == 'commercial') ? 'd-none' : '' }}">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Length</label><br>
                                                            <span id="alerterrorplot_length" class="post-property"></span>

                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Length" name="plot_length" id="plot-length" value="{{$propertiesData->area_height}}">
                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25 {{($propertiesData->categories_type == 'plot' && $propertiesData->property_type == 'commercial') ? 'd-none' : '' }}">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Width</label><br>
                                                            <span id="alerterrorplot_width" class="post-property"></span>

                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Width" name="plot_width" id="plot-width" value="{{$propertiesData->area_width}}">
                                                    </div>
                                                </div>


                                                <div class="residential-property-type {{$propertiesData->categories_type == 'plot' ? 'd-none' : ''}}">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-xl-6 mb25 {{($propertiesData->property_type == 'commercial' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell')) ? 'd-none' : ''}}">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">BHK <span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="total_property" value="1 RK" id="one-rk" {{$propertiesData->total_property == '1 RK' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="one-rk">1 RK</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="total_property" value="1 BHK" id="one-bhk" {{$propertiesData->total_property == '1 BHK' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="one-bhk">1 BHK</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="total_property" value="2 BHK " id="two-bhk" {{$propertiesData->total_property == '2 BHK' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="two-bhk">2 BHK</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="total_property" id="three-bhk" value="3 BHK" {{$propertiesData->total_property == '3 BHK' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="three-bhk">3 BHK</label>
                                                            </div>

                                                            <div class="form-check form-check-inline three-plus-bhk">
                                                                <input class="form-check-input" type="radio" name="total_property" id="plus-three-bhk">
                                                                <label class="form-check-label fw600" for="plus-three-bhk">3+ BHK</label>
                                                            </div>

                                                            <div class="after-3bhk d-none">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="4 BHK " id="four-bhk" {{$propertiesData->total_property == '4 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="four-bhk">4 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="5 BHK" id="five-bhk" {{$propertiesData->total_property == '5 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="five-bhk">5 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="6 BHK" id="six-bhk" {{$propertiesData->total_property == '6 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="six-bhk">6 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="7 BHK" id="seven-bhk" {{$propertiesData->total_property == '7 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="seven-bhk">7 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="8 BHK" id="eight-bhk" {{$propertiesData->total_property == '8 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="eight-bhk">8 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="9 BHK" id="nine-bhk" {{$propertiesData->total_property == '9 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="nine-bhk">9 BHK</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio" name="total_property" value="10 BHK" id="ten-bhk" {{$propertiesData->total_property == '10 BHK' ? 'checked' : ''}}>
                                                                    <label class="form-check-label fw600" for="ten-bhk">10 BHK</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-sm-6 col-xl-6 mb25 built-up-area-width">
                                                            <div class="location-area">
                                                                <label for="built-up-area" class="ff-heading fw600 mb10 ">Built Up Area <span class="mandatoryMarker">*</span></label><br>
                                                                <span id="alerterrorbuilt_up_area" class="post-property"></span>
                                                            </div>
                                                            <input type="number" class="form-control" name="built_up_area" id="built-up-area" placeholder="Built Up Area" oninput="showSqft(this)" value="{{$propertiesData->built_up_area}}">
                                                        </div>

                                                        <div class="col-sm-4 col-xl-3 mb25 custom-display-inline bathroom-section-width {{($propertiesData->property_type == 'commercial' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell')) ? 'd-none' : ''}}">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb20">Number of Bathooms<span class="mandatoryMarker">*</span></label>
                                                                <span id="alerterrorsearch_city" class="post-property"></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="bath" id="bath" placeholder="Number of Bathooms" value="{{$propertiesData->bath}}">
                                                        </div>

                                                        <div class="col-sm-6 col-xl-6 mb25  bathroom-section-width {{($propertiesData->property_type == 'commercial' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell')) ? 'd-none' : ''}}">
                                                            <div class="location-area">
                                                                <label for="number" class="ff-heading fw600 mb10">Number of Balconies <span class="mandatoryMarker">*</span></label><br>
                                                                <span id="alerterrorproject_society" class="post-property"></span>

                                                            </div>
                                                            <input type="number" class="form-control" name="balconies" id="balconies" placeholder="Number of Balconies" value="{{$propertiesData->balconies}}">
                                                        </div>

                                                        <div class="col-sm-4 col-xl-4 mb25  bathroom-section-width {{($propertiesData->property_type == 'commercial' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell')) ? 'd-none' : ''}}">
                                                            <div class="location-area">
                                                                <label class="ff-heading fw600 mb10">Age of property<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age_of_property" value="0-1" id="age-of-property0-1" {{$propertiesData->age_of_property == '0-1' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="age-of-property0-1">0-1 years</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age_of_property" value="1-5" id="age-of-property1-5" {{$propertiesData->age_of_property == '1-5' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="age-of-property1-5">1-5 years</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age_of_property" value="5-10" id="age-of-property5-10" {{$propertiesData->age_of_property == '5-10' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="age-of-property5-10">5-10 years</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="age_of_property" value="10" id="age-of-property10plus" {{$propertiesData->age_of_property == '10' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="age-of-property10plus">10+ years</label>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="residential-property-type {{$propertiesData->categories_type == 'plot' ? 'd-none' : ''}}">
                                                    <div class="row {{($propertiesData->property_type == 'commercial' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell')) ? 'd-none' : ''}}">
                                                        <div class="col-sm-6 col-xl-6 mb25">
                                                            <div class="location-area">
                                                                <label class="ff-heading fw600 mb10">Furnish Type<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="furnishing" value="fully furnished" id="fully-furnished" {{$propertiesData->furnishing == 'fully furnished' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="fully-furnished">Fully Furnished</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="furnishing" value="semi furnished" id="semi-furnished" {{$propertiesData->furnishing == 'semi furnished' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="semi-furnished">Semi Furnished</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="furnishing" value="unfurnished" id="unfurnished" {{$propertiesData->furnishing == 'unfurnished' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="unfurnished">Unfurnished</label>
                                                            </div>

                                                            <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#add-amenities" role="button"><span class=" d-xl-block">+ Add Furnishings / Amenities</span></a>
                                                            <div class="css-1m8aqr3">
                                                                <div>
                                                                    <div class="flat-furnishings">

                                                                    </div>

                                                                    <input type="hidden" name="residential_amenities" id="residential-amenities">

                                                                    <div class="society-amenities">
                                                                        <!-- Society Amenities checkboxes -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="css-1m8aqr3">
                                                        @php
                                                        $amenities = explode(',', $propertiesData->amenites);
                                                        @endphp

                                                        @foreach($amenities as $item)
                                                        {{ $item }}
                                                        @endforeach
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="commercial-property-type {{ ($propertiesData->property_type == 'residential' && ($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell' || $propertiesData->looking_to == 'pg')) ? 'd-none' : '' }}">
                                                <div class="row">

                                                    <div class=" custom-basic-title ff-heading fw600 mb10 {{$propertiesData->categories_type == 'plot' ? 'd-none' : '' }}"> POSSESSTION INFO</div>

                                                    <div class="col-sm-6 col-xl-6 mb25 plot-seclet {{$propertiesData->categories_type == 'plot' ? 'd-none' : '' }}">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Posession status<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alertMessageposession_status" class="post-property"></span>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="posession_status" value="ready to move" id="posession-ready" {{$propertiesData->posession_status == 'ready to move' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="posession-ready">Ready to move</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="posession_status" value="under construction" id="posession-under" {{$propertiesData->posession_status == 'under construction' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="posession-under">Under construction</label>
                                                        </div>

                                                    </div>



                                                    <div class="col-sm-6 col-xl-6 mb25 seclet-shop-sell">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Available From<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterroravailable_from" class="post-property"></span>
                                                        </div>
                                                        <input type="text" class="form-control datepicker" name="available_from" id="available-from" placeholder="Available From" value="{{$propertiesData->available_from}}">
                                                    </div>


                                                </div>


                                                <div class="secleted-office">
                                                    <div class="row">
                                                        <div class="custom-basic-title ff-heading fw600 mb10"> ABOUT THE PROPERTY</div>

                                                        <div class="col-sm-6 col-xl-6 mb25 zone-width">
                                                            <div class="location-area">
                                                                <label class="ff-heading fw600 mb10">{{$propertiesData->categories_type == 'office' ? 'Zone Type' : 'Suitable For'}}<span class="mandatoryMarker">*</span></label><br>
                                                                <span id="alertMessagezone_type" class="post-property"></span>
                                                            </div>

                                                            @if($propertiesData->categories_type == 'office')

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="industrial" id="zone-industrial" {{$propertiesData->zone_type == 'industrial' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-industrial">Industrial</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="commercial" id="zone-commercial" {{$propertiesData->zone_type == 'commercial' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-commercial">Commercial</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="residential" id="zone-residential" {{$propertiesData->zone_type == 'residential' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-residential">Residential</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="open spaces" id="zone-spaces" {{$propertiesData->zone_type == 'open spaces' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-spaces">Open Spaces</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="agricultural zone" id="zone-agricultural" {{$propertiesData->zone_type == 'agricultural zone' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-agricultural">Agricultural zone</label>
                                                            </div>

                                                            @elseif($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse')

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="jewwllery" id="zone-jewwllery" {{$propertiesData->zone_type == 'jewwllery' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-jewwllery">Jewellery</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="gym" id="zone-gym" {{$propertiesData->zone_type == 'gym' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-gym">Gym</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="grocery" id="zone-grocery" {{$propertiesData->zone_type == 'grocery' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-grocery">Grocery</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="footwear" id="zone-footwear" {{$propertiesData->zone_type == 'footwear' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-footwear">Footwear</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="clinic" id="zone-clinic" {{$propertiesData->zone_type == 'clinic' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-clinic">Clinic</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="electronics" id="zone-electronics" {{$propertiesData->zone_type == 'electronics' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-electronics">Electronics</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="clothing" id="zone-clothing" {{$propertiesData->zone_type == 'clothing' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="zone-clothing">Clothing</label>
                                                            </div>

                                                            @elseif($propertiesData->categories_type == 'plot')


                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="industrial" id="zonePlot-industrial" {{$propertiesData->zone_type == 'industrial' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-industrial">Industrial</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="commercial" id="zonePlot-commercial" {{$propertiesData->zone_type == 'commercial' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-commercial">Commercial</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="residential" id="zonePlot-residential" {{$propertiesData->zone_type == 'residential' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-residential">Residential</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="open spaces" id="zonePlot-spaces" {{$propertiesData->zone_type == 'open spaces' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-spaces">Open Spaces</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="special economic zone" id="zonePlot-economic" {{$propertiesData->zone_type == 'special economic zone' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-economic">Special economic zone</label>
                                                            </div>


                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="zone_type" value="agricultural zone" id="zonePlot-agricultural" {{$propertiesData->zone_type == 'agricultural zone' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="zonePlot-agricultural">Agricultural zone</label>
                                                            </div>

                                                            @endif
                                                        </div>
                                                        @if(!empty($propertiesData->location_hub))
                                                        <div class="col-sm-6 col-xl-6 mb25 location-hub-width">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Location Hub<span class="mandatoryMarker">*</span></label><br>
                                                                <span id="alertMessagelocation_hub" class="post-property"></span>

                                                            </div>
                                                            @if($propertiesData->categories_type == 'office')


                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="it park" id="location-it" {{$propertiesData->location_hub == 'it park' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="location-it">IT Park</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="business park" id="location-business" {{$propertiesData->location_hub == 'business park' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="location-business">Business Park</label>
                                                            </div>

                                                            @elseif($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse')

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="mall" id="lHub-mall" {{$propertiesData->location_hub == 'mall' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="lHub-mall">Mall</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="commercial project" id="lHub-commercial" {{$propertiesData->location_hub == 'commercial project' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="lHub-commercial">Commercial Project</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="residential project" id="lHub-residential" {{$propertiesData->location_hub == 'residential project' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="lHub-residential">Residential Project</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="location_hub" value="market high street" id="lHub-market" {{$propertiesData->location_hub == 'market high street' ? 'checked' : 'disabled'}}>
                                                                <label class="form-check-label fw600" for="lHub-market">Market/High Street</label>
                                                            </div>
                                                            @endif

                                                        </div>
                                                        @endif
                                                    </div>

                                                    <!-- <div class="row">
                                                        <div class="col-sm-6 col-xl-6 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Property Condition<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="property_condition" id="condition-use">
                                                                <label class="form-check-label fw600" for="condition-use">Ready to use</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="property_condition" id="condition-shell">
                                                                <label class="form-check-label fw600" for="condition-shell">Bare shell</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6 col-xl-6 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Built Up Area<span class="mandatoryMarker">*</span></label><br>
                                                                <span id="alerterrorcomm_built_up_area" class="post-property"></span>

                                                            </div>
                                                            <input type="text" class="form-control" name="comm_built_up_area" id="comm-built-up-area" placeholder="Built Up Area">
                                                        </div>


                                                    </div> -->
                                                </div>

                                                <div class="seclected-Retail-Shop">


                                                    <div class="row {{($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse') ? '' : 'd-none'}}">
                                                        <!-- <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Built Up Area<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Built Up Area" id="comm-built-up-area" name="comm_built_up_area">
                                                        </div>


                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Carpet Area<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Carpet Area" name="comm_carpet_area">
                                                        </div> -->

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Entrance width in feet<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Entrance width in feet" name="comm_area_width" value="{{$propertiesData->area_width}}">
                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Ceiling height in feet<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Ceiling height in feet" name="comm_area_height" value="{{$propertiesData->area_height}}">
                                                        </div>


                                                        <div class="col-sm-6 col-xl-6 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Located Near<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="comm_located_near" value="entrance" id="located-entrance" {{$propertiesData->located_near == 'entrance' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="located-entrance">Entrance</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="comm_located_near" value="elevator" id="located-elevator" {{$propertiesData->located_near == 'elevator' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="located-elevator">Elevator</label>
                                                            </div>

                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="comm_located_near" value="stairs" id="located-stairs" {{$propertiesData->located_near == 'stairs' ? 'checked' : ''}}>
                                                                <label class="form-check-label fw600" for="located-stairs">Stairs</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row">

                                                    <div class="col-sm-4 col-xl-4 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Ownership<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ownership" value="freehold" id="own-freehold" {{$propertiesData->ownership == 'freehold' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="own-freehold">Freehold</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ownership" value="leasehold" id="own-leasehold" {{$propertiesData->ownership == 'leasehold' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="own-leasehold">Leasehold</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ownership" value="cooperative society" id="own-cooperative" {{$propertiesData->ownership == 'cooperative society' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="own-cooperative">Cooperative society</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="ownership" value="power attorney" id="own-attorney" {{$propertiesData->ownership == 'power attorney' ? 'checked' : 'disabled'}}>
                                                            <label class="form-check-label fw600" for="own-attorney">Power of attorney</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Negotiable</label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="negotiable-Yes" name="negotiable" value="yes" {{$propertiesData->negotiable == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="negotiable-Yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="negotiable-No" name="Negotiable" value="no" {{$propertiesData->negotiable == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="negotiable-No">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">DG & UPS Charge included?</label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="ups-charge-yes" name="dg_ups_charge" value="yes" {{$propertiesData->dg_ups_charge == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="ups-charge-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="ups-charge-No" name="dg_ups_charge" value="no" {{$propertiesData->dg_ups_charge == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="ups-charge-No">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25 seclet-shop-sell">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Electricity charges included?</label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="electricity-yes" name="electricity_charges" value="yes" {{$propertiesData->electricity_charges_include == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="electricity-yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="electricity-No" name="electricity_charges" value="no" {{$propertiesData->electricity_charges_include == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="electricity-No">No</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25 seclet-shop-sell">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Water charges included?</label><br>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="waterChar-Yes" name="water_charges" value="yes" {{$propertiesData->water_charges == 'yes' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="waterChar-Yes">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" id="waterChar-No" name="water_charges" value="no" {{$propertiesData->water_charges == 'no' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="waterChar-No">No</label>
                                                        </div>
                                                    </div>



                                                    <!-- <div class="col-sm-6 col-xl-6 mb25 commerical-rent-property {{($propertiesData->property_type == 'commercial' && $propertiesData->looking_to == 'rent') ? '' : 'd-none' }}">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Expected Rent Increase</label><br>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Expected Rent Increase" name="expected_rent_increase" >
                                                    </div> -->
                                                </div>

                                                <div class="row plot-seclet {{$propertiesData->categories_type == 'plot' ? 'd-none' : ''}}">
                                                    <div class=" custom-basic-title ff-heading fw600 mb10">FLOORS AVAILABLE</div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Total Floors<span class="mandatoryMarker">*</span></label><br>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Total Floors" name="total_floors" id="total-floors" value="{{$propertiesData->total_property}}">

                                                    </div>

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label for="phone" class="ff-heading fw600 mb10">Your Floor</label><br>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Your Floor" name="your_floor" value="{{$propertiesData->your_floor}}">

                                                    </div>
                                                </div>

                                                <div class="secleted-office plot-seclet {{$propertiesData->categories_type == 'plot' ? 'd-none' : ''}}">
                                                    <div class="row">
                                                        <div class="custom-basic-title ff-heading fw600 mb10">LIFTS & STAIRCASES</div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Number of staircase</label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="staircase" name="staircase" value="{{$propertiesData->staircase}}">

                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Passengers Lifts<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Passengers Lifts" name="lifts_staircases_passengers" value="{{$propertiesData->passengers_lifts}}">

                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Service Lifts<span class="mandatoryMarker">*</span></label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Service Lifts" name="lifts_staircases_service" value="{{$propertiesData->service_lifts}}">

                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25 {{($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse') ? 'd-none' : ''}}">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Conference Room</label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Conference Room" name="conference_room" value="{{$propertiesData->conference_room}}">

                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="plot-seclet {{$propertiesData->categories_type == 'plot' ? 'd-none' : ''}}">


                                                    <div class="custom-basic-title ff-heading fw600 mb10">FACILITIES</div>

                                                    <div class="secleted-office {{($propertiesData->categories_type == 'retail shop' || $propertiesData->categories_type == 'showroom' || $propertiesData->categories_type == 'warehouse') ? 'd-none' : ''}}">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-xl-3 mb25">
                                                                <div class="location-area">
                                                                    <label for="phone" class="ff-heading fw600 mb10">Min. Number of seats<span class="mandatoryMarker">*</span></label><br>
                                                                </div>
                                                                <input type="number" class="form-control" placeholder="Min. Number of seats" name="office_seats" value="{{$propertiesData->min_seats}}">

                                                            </div>
                                                            <div class="col-sm-3 col-xl-3 mb25">
                                                                <div class="location-area">
                                                                    <label for="phone" class="ff-heading fw600 mb10">please enter maximum seats<span class="mandatoryMarker">*</span></label><br>
                                                                </div>
                                                                <input type="number" class="form-control" placeholder="please enter maximum seats" name="office_max_seats" value="{{$propertiesData->max_seats}}">

                                                            </div>
                                                            <div class="col-sm-3 col-xl-3 mb25">
                                                                <div class="location-area">
                                                                    <label for="phone" class="ff-heading fw600 mb10">Number of Cabins<span class="mandatoryMarker">*</span></label><br>
                                                                </div>
                                                                <input type="number" class="form-control" placeholder="Number of Cabins" name="number_of_cabins" value="{{$propertiesData->cabins}}">

                                                            </div>
                                                            <div class="col-sm-3 col-xl-3 mb25">
                                                                <div class="location-area">
                                                                    <label for="phone" class="ff-heading fw600 mb10">Number of Meeting Rooms<span class="mandatoryMarker">*</span></label><br>
                                                                </div>
                                                                <input type="number" class="form-control" placeholder="Number of Meeting Rooms" name="meeting_rooms" value="{{$propertiesData->meeting_room}}">

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <!-- <div class="row"></div> -->
                                                        <div class="ff-heading fw600 mb10"></div>
                                                        <!-- PARKING FACILITIES -->
                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Private Parking</label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Private Parking" name="private_parking" value="{{$propertiesData->private_parking}}">

                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label for="phone" class="ff-heading fw600 mb10">Public Parking</label><br>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Public Parking" name="public_parking" value="{{$propertiesData->public_parking}}">

                                                        </div>
                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label class="ff-heading fw600 mb10">Private Washrooms<span class="mandatoryMarker">*</span></label>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Private Washrooms" name="private_washrooms" value="{{$propertiesData->private_washrooms}}">
                                                        </div>

                                                        <div class="col-sm-3 col-xl-3 mb25">
                                                            <div class="location-area">
                                                                <label class="ff-heading fw600 mb10">Public Washrooms<span class="mandatoryMarker">*</span></label>
                                                            </div>
                                                            <input type="number" class="form-control" placeholder="Public Washrooms" name="public_washrooms" value="{{$propertiesData->public_washrooms}}">
                                                        </div>




                                                    </div>

                                                    <a class="login-info d-flex align-items-center" data-bs-toggle="modal" href="#add-amenities-commerical" role="button"><span class=" d-xl-block">+ Add Furnishings / Amenities</span></a>

                                                    <div class="css-1m8aqr3">
                                                        <div>
                                                            <div class="flat-furnishings-comm">
                                                                <!-- Flat Furnishings checkboxes -->
                                                            </div>

                                                            <input type="hidden" name="commerical_amenities" id="commercial-amenities">

                                                            <div class="society-amenities-comm">
                                                                <!-- Society Amenities checkboxes -->
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="pg-living-section {{ $propertiesData->looking_to == 'pg' ? '' : 'd-none'}}">
                                                <div class="custom-basic-title ff-heading fw600 mb10">Add Room Details</div>
                                                <div class="row">
                                                    <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Room Type <span class="mandatoryMarker">*</span></label><br>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_room_type" value="private room" id="private-room" {{$propertiesData->room_type == 'private room' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="private-room">Private Room</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_room_type" value="double sharing" id="double_sharing" {{$propertiesData->room_type == 'double sharing' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="double_sharing">Double Sharing</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_room_type" value="triple sharing" id="triple_sharing" {{$propertiesData->room_type == 'triple sharing' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="triple_sharing">Triple Sharing</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pg_room_type" value="three plus sharing" id="three-plus-sharing" {{$propertiesData->room_type == 'three plus sharing' ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="three-plus-sharing">3+ Sharing</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Total Beds in this Room (Optional)</label><br>
                                                            <span id="alerterrortotal_beds_this_room" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Total Beds in this Room" id="pg-total-bad" name="total_beds_this_room" value="{{$propertiesData->bed_in_room}}">
                                                    </div>

                                                    <!-- <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Rent<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorpg_rent" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Rent" id="pg-rent" name="pg_rent" oninput="formatRent(this)">
                                                        <span id="formatted-rent"></span>

                                                    </div>

                                                    <div class="col-sm-3 col-xl-3 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Security Deposit<span class="mandatoryMarker">*</span></label><br>
                                                            <span id="alerterrorpg_security_deposit" class="post-property"></span>
                                                        </div>
                                                        <input type="number" class="form-control" placeholder="Security Deposit" name="pg_security_deposit" id="pg-security-deposite" oninput="formatRent(this)">
                                                        <span id="formatted-rent"></span>
                                                    </div> -->

                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Facilities Offered</label><br>
                                                        </div>
                                                        @php $facilities = explode(',', $propertiesData->amenites); @endphp
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-ac" name="pg_facilities[]" value="ac" {{in_array('ac', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-ac">AC</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-TV" name="pg_facilities[]" value="tv" {{in_array('tv', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-TV">TV in Room</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-personal" name="pg_facilities[]" value="personal cupboard" {{in_array('personal cupboard', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-personal">Personal Cupboard</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-table" name="pg_facilities[]" value="table chair" {{in_array('table chair', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-table">Table Chair</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-Balcony" name="pg_facilities[]" value="attached balcony" {{in_array('attached balcony', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-Balcony">Attached Balcony</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-bathroom" name="pg_facilities[]" value="attached bathroom" {{in_array('attached bathroom', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-bathroom">Attached Bathroom</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="facilities-Meals" name="pg_facilities[]" value="meals included" {{in_array('meals included', $facilities) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="facilities-Meals">Meals Included</label>
                                                        </div>


                                                    </div>


                                                    <div class="col-sm-6 col-xl-6 mb25">
                                                        <div class="location-area">
                                                            <label class="ff-heading fw600 mb10">Bathroom Style</label><br>
                                                        </div>
                                                        @php $bathroomStyle = explode(',', $propertiesData->bathroom_style); @endphp
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="bathStyle-Western" name="bath_style[]" value="western" {{ in_array('western', $bathroomStyle) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="bathStyle-Western">Western</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="checkbox" id="bathStyle-Indian" name="bath_style[]" value="indian" {{ in_array('indian', $bathroomStyle) ? 'checked' : ''}}>
                                                            <label class="form-check-label fw600" for="bathStyle-Indian">Indian</label>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <!------------- second section ----------------------------- -->

            <div class="thirds-section ">

                <div class="rent-selected">
                    <div class="row">
                        <div class="custom-basic-title ff-heading fw600 mb10">Add Price Details</div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">{{$propertiesData->looking_to == 'sell' ? 'Price' : 'Monthly Rent' }}<span class="mandatoryMarker">*</span></label><br>

                            </div>
                            <input type="number" class="form-control" name="monthly_rent" id="monthly-rent" placeholder="{{$propertiesData->looking_to == 'sell' ? 'Price' : 'Monthly Rent' }}" oninput="formatRent(this)" value="{{$propertiesData->looking_to == 'sell' ? $propertiesData->cost : $propertiesData->rent }}">
                            <span id="formatted-rent"></span>
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25 seclet-shop-sell {{ ( $propertiesData->categories_type == 'office' && $propertiesData->looking_to == 'sell' ) ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Lock-in Period</label><br>
                            </div>
                            <input type="number" class="form-control" placeholder="Lock in Period" name="lock_in_period" value="{{$propertiesData->lock_in_period}}">
                        </div>


                        <div class="col-sm-3 col-xl-3 mb25 commerical-rent-property {{($propertiesData->property_type == 'commercial' && $propertiesData->looking_to == 'rent') ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Security Deposit</label><br>
                                <span id="alerterrorsecuirty_deposite" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" placeholder="Security Deposit" name="secuirty_deposite" id="secuirty-deposite" value="{{$propertiesData->security_deposity}}">
                        </div>


                        <div class="col-sm-3 col-xl-3 mb25 commerical-rent-property {{$propertiesData->looking_to == 'pg' ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label for="phone" class="ff-heading fw600 mb10">Security Deposit</label><br>
                                <span id="alerterrorsecuirty_deposite" class="post-property"></span>

                            </div>
                            <input type="text" class="form-control" placeholder="Security Deposit" name="secuirty_deposite" id="secuirty-deposite" value="{{$propertiesData->security_deposity}}">
                        </div>


                        <div class="col-sm-3 col-xl-3 mb25 {{($propertiesData->property_type == 'residential' && $propertiesData->looking_to == 'rent') ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Available From</label><br>
                            </div>
                            <input type="date" class="form-control" name="available_from_res_rent" id="Res-rent-avilable" placeholder="Available From" value="{{$propertiesData->available_from}}">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25 price-column-width {{($propertiesData->property_type == 'residential' && $propertiesData->looking_to == 'rent') ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Security Deposit<span class="mandatoryMarker">*</span></label><br>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-none" value="none" {{$propertiesData->security_deposity == 'none' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="security-none">None</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-oneMonth" value="one month" {{$propertiesData->security_deposity == 'one month' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="security-oneMonth">1 month</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-twoMonth" value="two month" {{$propertiesData->security_deposity == 'two month' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="security-twoMonth">2 month</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="resi_security_deposite" id="security-custom" value="three month" {{$propertiesData->security_deposity == 'three month' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="security-custom">3 month</label>
                            </div>

                        </div>


                        <div class="col-sm-4 col-xl-4 mb25 {{($propertiesData->property_type == 'residential' && $propertiesData->looking_to == 'sell') ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Construction Status</label><br>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-ready" name="res_sell_constuction_status" value="ready to move" {{$propertiesData->construection_status == 'ready to move' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="constuction-status-ready">Ready to Move</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-under" name="res_sell_constuction_status" value="under construction" {{$propertiesData->construection_status == 'under construction' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="constuction-status-under">Under Construction</label>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="select-residential-sell ">
                    <div class="row">
                        <!-- <div class="custom-basic-title ff-heading fw600 mb10">Add Price Details</div>

                        <div class="col-sm-4 col-xl-4 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Cost<span class="mandatoryMarker">*</span></label><br>

                            </div>
                            <input type="text" class="form-control" placeholder="Cost" name="res_sell_cost" value="{{$propertiesData->cost}}">
                        </div> -->

                        <!-- 
                        <div class="col-sm-4 col-xl-4 mb25 select-under-construction ">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Possession Date {{$propertiesData}}</label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Possession Date" name="possion_date">
                        </div> -->
                        <!-- <div class="col-sm-4 col-xl-4 mb25 {{($propertiesData->property_type == 'residential' && $propertiesData->looking_to == 'sell') ? '' : 'd-none'}}">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Construction Status</label><br>
                            </div>


                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-ready" name="res_sell_constuction_status" value="ready to move" {{$propertiesData->construection_status == 'ready to move' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="constuction-status-ready">Ready to Move</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="constuction-status-under" name="res_sell_constuction_status" value="under construction" {{$propertiesData->construection_status == 'under construction' ? 'checked' : ''}}>
                                <label class="form-check-label fw600" for="constuction-status-under">Under Construction</label>
                            </div>

                        </div> -->


                    </div>
                </div>
                <div class="pg-living-section {{($propertiesData->looking_to == 'rent' || $propertiesData->looking_to == 'sell') ? 'd-none' : ''}}">
                    <div class="row">
                        <div class="ff-heading fw600 mb10 custom-basic-title">OTHER PG DETAILS</div>
                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Onetime Move in Charges (Optional)</label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Onetime Move in Charges" name="pg_onetime_move_charges" value="{{$propertiesData->move_in_charge}}">
                        </div>


                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Meal Charges per Month (Optional)</label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Meal Charges per Month" name="pg_meal_charges_month" value="{{$propertiesData->meal_charges}}">
                        </div>

                        <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Electricity Charges per Month</label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Electricity Charges per Month" name="pg_electricity_charges_month" value="{{$propertiesData->electricity_charges}}">
                        </div>

                        <!-- <div class="col-sm-3 col-xl-3 mb25">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10">Add Additional Information (Optional)</label><br>
                            </div>
                            <input type="text" class="form-control" placeholder="Add Additional Information" name="pg_additional_info" value="{{$propertiesData->additional_information}}">
                        </div> -->
                        <!-- <div class="col-sm-3 col-xl-3 mb25" id="discriptions">
                            <div class="location-area">
                                <label class="ff-heading fw600 mb10" for="discription">Add Additional Information </label><br>
                            </div>
                            <textarea class="form-control" name="" id="discription" cols="30" rows="10" placeholder="Add Additional Information"></textarea>
                        </div> -->


                    </div>
                </div>

                <div class="col-sm-3 col-xl-3 mb25" id="discriptions">
                    <div class="location-area">
                        <label class="ff-heading fw600 mb10" for="discription">Add Additional Information </label><br>
                    </div>
                    <!-- <input type="text" class="form-control" placeholder="Add Additional Information" name="pg_additional_info" value="{{$propertiesData->additional_information}}"> -->
                    <textarea class="form-control" name="additional_information" id="discription" cols="30" rows="10" placeholder="Add Additional Information">{{ $propertiesData->additional_information }}</textarea>
                </div>


                <div class="checked-commerical-sell-rent">


                    <div class="ps-widget bgc-white bdrs12 p30 overflow-hidden position-relative">
                        <h4 class="text-color-black fz17 mb30">Upload photos of your property</h4>
                        <span id="images-uploaderror" class="text-danger"></span>
                        <div class="col-lg-12">
                            <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2">

                                <div class="icon mb30"><span class="flaticon-upload"></span></div>
                                <h4 class="text-color-black fz17 mb10">Upload photos of your property</h4>
                                <label for="photo-upload" class="ud-btn btn-white">
                                    Browse Files<input id="photo-upload" type="file" accept="image/*" name="property_img[]" multiple style="display: none;">
                                    <i class="fal fa-arrow-right-long"></i>
                                </label>
                                <div class="custom-tooltip mb10" data-tooltip="Add 4+ properties photos & increase 24% response">
                                </div>

                            </div>
                            <div id="image-preview-container" class="image-preview-container"></div>
                            @if(!empty($propertiesData->images))
                            <div class="image-preview-space">
                                @php $image = explode(',', $propertiesData->images); @endphp
                                @foreach($image as $img)
                                <div class="preview-image">
                                    <img src="{{ asset('public/assets/property-images/' . $img) }}" alt="none">
                                    <span class="preview-delete" data-id="{{$propertiesData->id}}" data-images="{{$img}}"><i class="fa-solid fa-trash"></i></span>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p class="img-ms"><b>There are no images available for this property at the moment.</b></p>

                            @endif


                        </div>
                        <div class="col-lg-5">
                            <div class="profile-box position-relative d-md-flex align-items-end mb50" id="image-preview-container">
                                <div class="profile-img position-relative overflow-hidden bdrs12 mb20-sm">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4 class="text-color-black fz17 mb30">Upload Videos of your property</h4>
                            <span id="videos-uploaderror" class="text-danger"></span>


                            <div class="col-lg-12">
                                <div class="upload-img position-relative overflow-hidden bdrs12 text-center mb30 px-2">

                                    <div class="icon mb30"><span class="flaticon-upload"></span></div>
                                    <h4 class="text-color-black fz17 mb10">Upload Videos of your property</h4>
                                    <p class="text-color-black mb25">Add videos of your property</p>
                                    <label for="video-upload" class="ud-btn btn-white">
                                        Upload Videos<input id="video-upload" type="file" accept="video/*" name="property_video" style="display: none;">
                                        <i class="fal fa-arrow-right-long"></i>
                                        <div id="file-names-container"></div>
                                    </label>
                                    <div id="video-preview-container"></div>
                                </div>
                            </div>
                            @if(!empty($propertiesData->videos))
                            <span class="remove-video" data-id="{{$propertiesData->id}}"><i class="fa-solid fa-trash"></i></span>
                            <div id="video-player" style="text-align: center;"></div>
                            <video src="{{ asset('public/assets/property-videos/' . $propertiesData->videos) }}" controls autoplay id="property-video"></video>

                            @else
                            <p class="video-msg"><b>There are no videos available for this property at the moment.</b></p>
                            @endif
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-12 first-btn">
                <div class="d-sm-flex justify-content-between">
                    <button class="ud-btn btn-dark" id="continue-btn" type="submit">Continue<i class="fal fa-arrow-right-long"></i></button>
                </div>
            </div>
            </form>


        </div>
    </div>

</div>








<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: false,
            todayHighlight: true,
            showButtonPanel: true,
            showOnFocus: false,
            clearBtn: true,
            calendarWeeks: true,
            startDate: new Date(),
            todayBtn: false
        });

        document.getElementById('video-upload').addEventListener('change', function(event) {
            var videoContainer = document.getElementById('video-preview-container');
            videoContainer.innerHTML = ''; // Clear previous video previews

            var files = event.target.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var video = document.createElement('video');
                video.controls = true;
                video.style.width = '100%';
                video.style.height = "431px";
                video.style.marginTop = "25px";
                var source = document.createElement('source');
                source.src = URL.createObjectURL(file);
                video.appendChild(source);
                videoContainer.appendChild(video);
            }
        });




        var availableFromDate = new Date("{{$propertiesData->available_from}}");

        if (!isNaN(availableFromDate.getTime())) {
            $('.datepicker').datepicker('setDate', availableFromDate);
        } else {
            $('.datepicker').datepicker('setDate', new Date());
        }

        $('#plus-three-bhk').click(function() {

            $('.after-3bhk').removeClass('d-none');
            $('.three-plus-bhk').addClass('d-none');
        });

    });
</script>

<script>
    $(document).ready(function() {
        $('.preview-delete').on('click', function() {
            var propertyID = $(this).data('id');
            var image = $(this).data('images');
            var container = $(this).closest('.preview-image');

            Swal.fire({
                title: 'Confirm Deletion',
                text: "Are you sure you want to delete this image ? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: "{{route('remove.propertyImage')}}",
                        type: "POST",
                        data: {
                            propertyID: propertyID,
                            image: image,
                            "_token": "{{ csrf_token()}}"
                        },
                        success: function(response) {
                            if (response.success) {
                                container.remove();
                                Swal.fire(
                                    'Deleted!',
                                    'Your images has been deleted.',
                                    'success'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("Error:", error);
                        }
                    })
                }
            });
        });

        $('.remove-video').on('click', function() {
            var videoID = $(this).data('id');
            Swal.fire({
                title: "Confirm Deletion",
                text: "Are you sure you want to delete this video ? This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // alert(videoID);
                    $.ajax({
                        url: "{{route('remove.propertyVideo')}}",
                        type: "POST",
                        data: {
                            videoID: videoID,
                            "_token": "{{csrf_token()}}"
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('#property-video').hide();
                                Swal.fire(
                                    'Video Removed!',
                                    'The video has been successfully removed.',
                                    'success'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Error:', error);
                        }
                    });
                }
            });
        });
    });
</script>

<script>
    document.getElementById('photo-upload').addEventListener('change', function(e) {
        const files = e.target.files;
        const previewContainer = document.getElementById('image-preview-container');

        let rowContainer = previewContainer.lastElementChild;

        if (!rowContainer || rowContainer.children.length >= 4) {
            rowContainer = document.createElement('div');
            rowContainer.classList.add('row');
            previewContainer.appendChild(rowContainer);
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            const reader = new FileReader();

            const imageContainer = document.createElement('div');
            imageContainer.classList.add('col-lg-3', 'mb-3');

            const imgElement = document.createElement('img');
            imgElement.classList.add('img-thumbnail');
            imgElement.style.width = '100%';
            imgElement.style.height = '150px';
            imgElement.style.objectFit = 'cover';

            const fileNameElement = document.createElement('p');
            fileNameElement.textContent = file.name;

            const deleteButton = document.createElement('button');
            deleteButton.innerHTML = '<i class="fa-solid fa-trash"></i>';
            deleteButton.setAttribute('aria-label', 'Delete Item');
            deleteButton.classList.add('btn', 'btn-danger', 'mt-1', 'delete-button');
            deleteButton.addEventListener('click', function() {
                imageContainer.parentNode.removeChild(imageContainer);
            });

            reader.onload = function(e) {
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(file);

            imageContainer.appendChild(imgElement);
            imageContainer.appendChild(fileNameElement);
            imageContainer.appendChild(deleteButton);

            rowContainer.appendChild(imageContainer);

            if (rowContainer.children.length >= 4) {
                rowContainer = document.createElement('div');
                rowContainer.classList.add('row');
                previewContainer.appendChild(rowContainer);
            }
        }
    });
</script>



@endsection