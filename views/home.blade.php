@extends('gharkasapna.layouts.app')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

    * {
        margin: 0;
        padding: 0;
        font-family: "Roboto", sans-serif;
    }

    :root {
        --primary-heading-color: #252A2C;
    }

    .section-padding {
        width: 100%;
        padding: 100px 0;
    }

    .section-color {
        background-color: #F5F2E9;
    }

    .main-container {
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
    }

    .main-banner {
        background-color: #F5F2E9;
        width: 100%;

    }

    .main-banner-left {
        /* padding: 100px 10px 100px 370px; */
        width: calc(60% - 380px);
        background-color: #F5F2E9;

    }

    .main-banner-right {
        width: 40%;

    }

    h1 {
        font-family: "Merriweather", serif;
        font-size: 52px;
        font-weight: 400;
        line-height: 65px;
        color: var(--primary-heading-color)
    }

    h3 {
        font-weight: 600;
        font-size: 18px;
        color: #252A2C;
    }

    .flex-items {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .wide-range-list {
        width: 80%
    }

    .wide-range-list li {
        list-style: none;
        font-family: "Roboto", sans-serif;
        padding-bottom: 8px;
        font-size: 14px;
        color: #555555;
    }

    .wide-range-list i {
        height: 18px;
        width: 18px;
        font-size: 10px;
        color: #fff;
        background-color: #E86822;
        border-radius: 50%;
    }

    .wide-range-list .flex-items {
        gap: 4px;

    }

    .wide-range-list.flex-items {
        justify-content: start;
        padding-top: 30px;
    }

    .wide-range-list ul {
        padding-left: 0;
        padding-right: 40px;
    }



    .fa-magnifying-glass {
        background-color: #E86822;
        color: #fff;
        height: 40px;
        width: 40px;
        border-radius: 50%;
    }

    .search-bar {
        padding: 9px 6px 9px 20px;
        border-radius: 50%;
        background-color: #fff;
        border-radius: 50px 50px 50px 50px;
        width: calc(100% - 50px);
        font-family: "Roboto", sans-serif;
        position: relative;
    }

    #search-bar-field {
        border: 0 !important;
        outline: 0;

    }

    .search-bar.flex-items {
        justify-content: space-around;
        margin: 40px 0px;
        box-shadow: 0px 0px 11px #0000001c;
        flex-direction: column;
        align-items: start;
    }

    .search-bar select {
        border: 0;
        width: 17%;
        outline: 0;
        font-family: "Roboto", sans-serif;
    }

    .header-icon-list-section.flex-items {
        gap: 46px;
    }

    .header-icon-list-section.flex-items img {
        padding-right: 10px;
    }

    .header-icon-list-section.flex-items p {
        font-family: "Roboto", sans-serif;
        font-size: 15px;
        font-weight: 400;
        color: var(--primary-heading-color)
    }

    .explore-our-listing.flex-items {
        display: flex !important;
        flex-direction: column;
    }



    .explore-our-listing .main-container.flex-items {
        flex-direction: column;
        width: 100%;

    }

    .heading2 {
        font-family: "Merriweather", serif;
        font-size: 34px;
        font-weight: 400;
        line-height: 52px;
        padding-bottom: 6px;
        color: var(--primary-heading-color);
        text-align: center;
    }

    .para {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 400;
        color: #555555;
        padding-bottom: 20px;
        text-align: center;
        line-height: 26px;
    }

    .city-box-para p {
        font-weight: 300;
        font-size: 14px;
        color: var(--primary-heading-color);
    }

    .city-box-para h3 {
        font-size: 24px;
        font-weight: 500;
        padding-bottom: 6px;
    }



    .city-box img {
        height: 94px;
        width: 100px;
        padding-right: 20px;
    }

    .citybox-container.flex-items {
        width: 100%;
        justify-content: space-between;
        gap: 30px;
        padding: 15px 0;
    }

    .cities-box {
        width: 264px;
        cursor: pointer;
    }

    .cities-box:hover {
        box-shadow: 0px 0px 25px #00000030;
        border-radius: 8px;
        transform: scale(1.05);
        transition: all 0.3s;

    }

    .looking-icon-box-container {
        width: 100%;

    }

    .looking-iconbox {
        width: calc(33% - 70px);
        text-align: center;
        padding: 35px;
    }

    .looking-iconbox .para {
        font-size: 16px;
        line-height: 26px;
        padding-bottom: 35px;
    }

    .looking-icon-box-container h3 {
        padding: 20px 0;
    }

    .looking-icon-box-container a {

        color: #E86822;
        font-size: 16px;
        line-height: 16px;
        text-decoration: none;
        border: 1px solid #E86822;
        padding: 10px 38px;
        border-radius: 10px;
    }

    .looking-icon-box-container a:hover {
        background-color: #E86822;
        color: #fff;
        transition: all 0.3s;
    }



    .client-cell .flex-items {
        display: flex;
    }

    .client-cell .heading2 {
        text-align: left;
    }

    .client-cell .para {
        text-align: left;
        font-weight: 300;
        padding-right: 104px;
    }

    .client-cell-left {
        width: 58%;
    }

    .client-cell-right {
        width: 42%;
    }


    .client-cell-left {
        flex: 1;
        padding: 20px;
    }

    .client-cell-right {

        padding: 20px;
    }

    .client-cell-right h3 {
        font-size: 14px;
        font-weight: 600;
    }

    .client-check-boxes {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        width: 100%;
    }

    .client-check-box {
        list-style-type: none;
        margin-bottom: 10px;
    }

    .button-container {

        left: 310;
        position: absolute;
        margin-left: 50px;
    }

    .help-btn {
        display: flex;
        gap: 20px;
        padding-top: 30px;
    }

    .help-btn a {
        text-decoration: none;
        color: #fff;
        background-color: #E86822;
        font-size: 14px;
        padding: 11px 28px;
        border-radius: 10px;
        border: 1px solid #E86822;
    }

    .help-btn a:hover {
        border: 1px solid #E86822;
        background-color: #fff;
        color: #E86822;
        transition: all 0.3s;
    }

    .client-cell-leftbox {
        width: calc(50% - 15px);
        padding-right: 15px;
    }

    .client-cell-rightbox {
        width: calc(50% - 15px);
        padding-left: 15px;
    }

    .sell-box {
        text-align: center;
        background-color: #fff;
        padding: 30px 20px;
        border-radius: 14px;
        box-shadow: 1px 1px 15px #0000000f;
        border-bottom: 3px solid #fff;
    }

    .sell-box .para {
        text-align: center;
        font-size: 14px;
        font-weight: 300;
        padding: 0;
    }


    .sell-box h3 {
        padding: 12px 0 8px;
    }

    .client-cell-leftbox .sell-box {
        margin-bottom: 30px;
    }

    .sell-box:hover {
        border-bottom: 3px solid #E86822;
        transition: all 0.1s;
        cursor: pointer;
        box-shadow: 0px 0px 30px #0000004d;
    }




    .latest-properties .flex-items {
        display: flex;
        flex-direction: column;
    }

    .property-tab {
        text-decoration: none;
        background-color: #F5F2E9;
        color: #E86822;
        padding: 10px 30px;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        font-size: 15px;
    }

    .tab-active {
        background-color: #E86822;
        color: #fff;
        fill: #fff;
    }

    .latest-properties-section {
        padding: 30px 0;


    }

    .latest-properties-section .properties-tabs.flex-items {
        flex-direction: row;
        gap: 50px;
    }

    .property-image-boxes {
        width: calc(33.33% - 30px);
    }

    .property-image-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center center;
    }

    .property-image-boxes {
        padding: 70px 0 0px;

    }

    .property-image-box {
        position: relative;
        width: 370px;
        height: 250px;
    }

    .property-featured {
        padding: 5px 15px;
        background-color: #1B909A;
        border-radius: 10px;
        color: #fff;
        /* display: inline; */
    }

    .property-sales {
        padding: 5px 15px;
        background-color: #CC6531;
        border-radius: 10px;
        color: #fff;
        /* display: inline; */
    }

    .featured-cells {
        position: absolute;
        top: 15px;
        display: flex;
        justify-content: space-between;
        width: calc(100% - 20px);
        padding: 0 10px;
    }

    .featured-icon-box {
        height: 35px;
        width: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background-color: #00000055;
        border-radius: 8px;


    }

    .featured-icon {
        display: flex;
        gap: 15px;
        width: calc(100% - 20px);
        position: absolute;
        bottom: 10px;
    }

    .featured-tags {
        padding: 10px 0 5px;
        color: #222222;
    }

    .property-image-boxes h3 {
        font-size: 15px;
        font-weight: 600;
        color: var(--primary-heading-color);
        padding: 8px 0
    }



    .feature-image-para .para {
        text-align: left;
        padding: 12px 0 10px;
        font-weight: 300;

    }

    .bottom-features {
        display: flex;
        justify-content: space-between;
        align-items: end;
        gap: 12px;
        padding: 8px 0;
    }

    .feature-btn {
        background-color: #FDF0E9;
        border: 1px solid #e868222b;
        padding: 10px 38px;
        text-decoration: none;
        color: #E86822;
        border-radius: 10px;
        display: flex;
        gap: 5px;
        align-items: center;
    }

    .feature-btn.feature-whatsapp {

        padding: 10px 18px;

    }

    .features-contact {
        padding-top: 20px;
        display: flex;
        justify-content: space-between;
    }

    .property-images-contianer {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        display: none;
    }

    .confidence {
        background-image: linear-gradient(90deg, #00000050, #000000), url(images/new-home-images/family-image.png);
        padding: 100px 0;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
        background-color: linear-gradient(180deg, #000);
        background-color: #00000052;
    }

    .confidence {
        width: 100%;
    }

    .confidence .heading2 {
        color: #fff;
    }

    .confidence-left {
        width: 43%;
    }

    .confidence-right {
        width: 57%;
        text-align: end;

    }

    .confidence-right .para {
        color: #fff;

    }

    .confidence-btn {
        background-color: #ffffff00;
        text-decoration: none;
        color: #fff;
        padding: 10px 30px;
        border: 1px solid #ffffff;
        border-radius: 10px;
    }

    .confidence-btn:hover {
        background-color: #fff;
        color: #000;
        transition: all 0.3s;

    }

    .confidence-right .para {
        text-align: right;
        padding-bottom: 34px;
    }

    .confidence-right .heading2 {
        text-align: right;
    }



    .localities .flex-items {
        display: flex;
        flex-direction: column;
    }

    .localities-carousel-box {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: start;
        gap: 30px;
    }

    .localities-box {
        width: calc(33.33% - 30px);

    }

    .localities-box img {
        width: 100%;
    }


    .localities-box.flex-items {
        position: relative;

    }

    .looking-section.section-padding {
        padding-top: 0;
    }


    .localities-box-para {
        background-color: #ffffff;
        padding: 30px;
    }

    .localities h4 {
        font-size: 18px;
        font-weight: 500;
    }

    .localities-box-para {
        width: 70%;
        border-radius: 8px;
    }


    .localities .para {
        text-align: left;
        padding: 8px 0;
        font-size: 14px;
        color: #252A2C;
    }


    .localities-box-para {
        margin-top: -65px;
        box-shadow: 0px 5px 10px #0000001a;
    }

    .localities-featured {
        padding: 5px 15px;
        background-color: #1B909A;
        border-radius: 10px;
        color: #fff;
    }


    .localities-featured-box {
        position: absolute;
        top: 12px;
        left: 14px;
    }

    .property-container {
        padding: 100px 0
    }

    .property-container .flex-items {
        display: flex;
        flex-direction: column;
    }

    .property-container .para {
        padding: 0 13%;
        font-size: 14px;
    }

    .property-rent-carousel {
        width: 100%;
        transition: all 0.6s;
    }

    .navigation-icon {
        position: absolute;
        width: 100%;
        display: flex;
        justify-content: space-between;
        bottom: 15px;
        top: 50%;

    }

    .navigation-icon i {
        color: #fff;
    }

    .property-rent-boxes {
        width: calc(33.33% - 30px);
    }

    .property-rent-box img {
        width: 380px;
    }

    .property-rent-boxes {
        padding: 70px 0 0px;

    }

    .property-rent-box {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .property-rent-boxes h3 {
        font-size: 18px;
    }

    .property-section-featured {
        padding: 5px 15px;
        background-color: #1B909A;
        border-radius: 10px;
        color: #fff;
    }

    .property-section-sales {
        padding: 5px 15px;
        background-color: #CC6531;
        border-radius: 10px;
        color: #fff;

    }

    .property-featured-cells {
        position: absolute;
        top: 15px;
        display: flex;
        justify-content: space-between;
        width: calc(100% - 20px);
        padding: 0 10px;
    }

    .property-container .feature-image-para .para {
        padding: 0;
    }

    .property-featured-tags {
        padding: 10px 0;
    }

    .property-featured-tags span {
        font-size: 14px;
        color: #252A2C;

    }

    .price {
        color: #E86822;
        font-size: 16px;
        padding: 8px 0;
        font-weight: 500;
    }

    .property-rent-carousel.flex-items {
        flex-direction: row;
        gap: 14px 45px;
        flex-wrap: nowrap;
        justify-content: start;
    }

    .feature-image-para {
        padding: 20px;
    }

    .bottom-features span {
        font-size: 13px;
        color: #5C727D;
    }

    button.dot {
        background: #ec682252;
        border-radius: 50%;
        height: 8px;
        width: 8px;
        border: none;
    }

    .property-rent-pointer {
        width: 100%;
        display: flex;
        gap: 14px;
        justify-content: center;
    }

    .property-image-boxx.flex-items {
        flex-direction: row;
        background-color: #fff;
        position: relative;
        border-radius: 25px;
        box-shadow: 0px 0px 15px #0000002e;
    }

    .property-image-box-left {
        width: 50%;

    }


    .property-image-box-left img {
        width: 280px;
        height: 320px;
        object-fit: cover;
        object-position: center center;
        border-radius: 25px 0 0 25px;
    }

    .property-image-box-right {
        width: calc(50% - 40px);
        padding: 20px;

    }

    .property-image-box-right .featured-icon {
        position: relative;
    }

    .property-image-box-right .para {
        text-align: left;
        padding: 8px 0 16px;
    }

    .featured-properties-images-box {
        width: calc(50% - 25px);
    }

    .feature-box-images-container.flex-items {
        padding: 50px 0;
        flex-direction: row;
        gap: 50px;
    }

    .featured-properties {
        background-color: #F5F2E9;

    }

    .property-image-box-right .bottom-features {
        padding-top: 20px;
    }

    .featured-container-strip {
        position: absolute;
        color: #fff;
        border-radius: 8px;
        background-color: #3991a2;
        padding: 6px 16px;
        font-size: 14px;
        top: 16px;
        left: 16px;
    }

    .sell-your-home {
        background-image: url(images/new-home-images/sell-your-home.png);
    }

    .sell-your-home .flex-items {
        display: flex;

    }

    .sell-your-home .heading2 {
        text-align: start;
    }

    .sell-your-home .para {
        text-align: start;
        padding-bottom: 40px;
    }

    .sell-your-home .confidence-btn {
        padding: 10px 35px;
    }



    .sell-your-home .heading2 {
        color: #fff;
    }

    .sell-your-home .para {
        color: #fff;
    }

    .sell-your-left {
        width: 58%;
    }

    .sell-your-right {
        width: 42%;
    }

    .why-choose-us .flex-items {
        display: flex;
    }

    .why-choose-us .para {
        padding: 0 26%;
    }

    .choose-icon-box {
        width: calc(33.33% - 28px);
    }


    .choose-icon-box.flex-items {
        display: flex;
        align-items: start;
        padding-bottom: 40px;
    }

    .choose-icon-box-container {
        padding: 50px 0;
    }

    .para-choose .para {
        text-align: start;
        padding: 0;
    }

    .icon-choose {
        width: 18%;
    }

    .para-choose {
        width: 82%;
    }

    .choose-icon-box-container.flex-items {
        gap: 38px;
        align-items: start;
    }

    .testimonial .flex-items {
        display: flex;
        flex-direction: column;
    }

    .testimonial .para {
        padding: 0 26%;
    }

    .image-box-left {
        height: 45px;
        width: 45px;

    }

    .image-box-left img {
        object-fit: cover;
        object-position: center center;
        height: 100%;
        width: 100%;
        border-radius: 50%;

    }

    .testimonial-caraousel {
        padding-top: 50px;
        width: 100%;
    }

    .testimonial-content {
        background-color: #fff;
        padding: 40px 1px 40px 40px;
        width: calc(33.33% - 58px);
        border-radius: 5px;
        box-shadow: 0px 0px 15px #0000000d;
    }

    .testimonial-image-box.flex-items {
        flex-direction: row !important;
        padding-bottom: 14px;
    }



    .image-box-right {
        width: calc(100% - 60px);
        padding-left: 15px;
    }

    .testimonial-content .para {
        text-align: start;
        padding: 0;
        padding-bottom: 15px;
        line-height: 24px;
        color: #555555;
    }

    .caraousel-lists.flex-items {
        flex-direction: row;
        gap: 23px;
        justify-content: space-between;
    }

    .testimonial-rating span {
        color: #FFC662;
    }

    .image-box-right p {
        font-weight: 300;
        color: #252A2C;
        font-size: 14px;
    }

    .latest .flex-items {
        display: flex;
        flex-direction: column;
    }

    .news-strip {
        width: 100%;
    }

    .new-image-box {
        width: 100%;

    }

    .new-image-box img {
        width: 100%;
        border-radius: 7px;
    }

    .strip-image-container {
        width: calc(20% - 16px);
    }

    .strip-image-container h3 {
        font-size: 14px;
        padding: 9px 0 6px;
        font-weight: 700;
    }

    .strip-image-container .para {
        text-align: start;
        font-size: 11px;
        line-height: 18px;
        padding-bottom: 10px;
        color: #5C727D;
    }

    .published {
        font-size: 12px;
        color: #5C727D;
    }

    .news-strip.flex-items {
        display: flex;
        flex-direction: row;
        gap: 20px;
        padding-top: 40px;
    }

    .featured-properties .flex-items {
        display: flex;
    }

    .bar-search.flex-items {
        width: 100%;
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    button.btn.dropdown-toggle.btn-light {
        outline: 0 !important;
        border: none;
    }


    select#search-list {
        width: 100%;
        outline: auto;
    }

    .property-rent-caraousel,
    .property-rent-caraousel1,
    .property-rent-caraousel2 {
        display: flex;
        transition: all 0.6s;
    }

    .property-icon-box {
        cursor: pointer;
    }

    .property-tab svg {
        width: 25px;
        height: 100%;
    }

    .search-bar select,
    .search-bar input {
        padding: 8px 0;
        border-right: 1px solid #00000026 !important;
    }

    .search-bar select {
        appearance: none;
    }

    .result-list {
        background-color: #fff;
        box-shadow: 0px 0px 25px #00000030;
        width: 90%;
        padding: 20px 0;
        position: absolute;
        top: 62px;
        border-radius: 8px;
        display: none;
    }

    .result-list ul {
        list-style: none;

    }

    .result-list ul li {
        padding: 8px 0 8px 10px;
        cursor: pointer;

    }

    .result-list ul li:hover {
        background-color: #E86822;
        color: #fff;
        transition: all 0.3s;
    }

    .show-class {
        display: block;
    }

    .rent-caraousel-parent {
        width: 1200px;
        overflow: hidden;

    }

    .headingPara {
        font-size: 14px;
        text-transform: capitalize;
    }

    .property-rent-caraousel {
        width: 370px;
        height: 250px;
    }

    input#search-bar-field {
        border: none;
        outline: none;
    }

    .property-tab.active {
        background-color: #E86822;
        color: #fff;
        fill: #fff;
    }

    .property-images-contianer.active {
        display: flex;
    }

    .dropdown-toggle::after {
        display: none;
    }


    .dropdown.bootstrap-select.dropup {
        width: 25% !important;
    }

    .dropdown.bootstrap-select {
        width: 38% !important;
    }
</style>

@php

function formatRent($rent)
{
if (!is_numeric($rent)) {
return 'N/A'; // or any other appropriate value
}

if ($rent >= 10000000) {
return '₹' . number_format($rent / 10000000, 2) . ' Cr';
} elseif ($rent >= 100000) {
return '₹' . number_format($rent / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($rent / 1000, 2) . ' K';
}
}

function formatCost($cost)
{
if (!is_numeric($cost)) {
return 'N/A'; // or any other appropriate value
}

if ($cost >= 10000000) {
return '₹' . number_format($cost / 10000000, 2) . ' Cr';
} elseif ($cost >= 100000) {
return '₹' . number_format($cost / 100000, 2) . ' Lac';
} else {
return '₹' . number_format($cost / 1000, 2) . ' K';
}
}

@endphp


<div class="main-banner flex-items">
    <!-- <div class="main-container flex-items"> -->
    <div class="main-banner-left">

        <h1>Find The Perfect Place To Live With Your Family</h1>
        <div class="wide-range-list flex-items">
            <div class="left-wide-range">
                <ul>
                    <li class='flex-items'><i class="fa-solid fa-check flex-items"></i>Wide Range of Properties</li>
                </ul>
                <ul>
                    <li class='flex-items'><i class="fa-solid fa-check flex-items"></i>100% Transparency</li>
                </ul>

            </div>
            <div class="right-wide-range">
                <ul>
                    <li class='flex-items'><i class="fa-solid fa-check flex-items"></i>Trusted By Thousands</li>
                </ul>

                <ul>
                    <li class='flex-items'><i class="fa-solid fa-check flex-items"></i>Verified Brokers</li>
                </ul>
            </div>


        </div>
        <div class="search-bar flex-items">
            <div class="bar-search flex-items">
                <input id="search-bar-field" type="text" placeholder="Search Here" class="d-none">
                <select name="Location" id="location" class="selectpicker" data-live-search="true">
                    <option selected>Location</option>
                    @php
                    $uniqueCities = array_unique(array_map('strtolower', $location->toArray()));
                    @endphp
                    @foreach($uniqueCities as $city)
                    <option value="{{$city}}">{{ucfirst($city)}}</option>
                    @endforeach
                </select>
                <select name="looking_to" id="looking-to" class="selectpicker" data-live-search="true">
                    <option disabled>Buy or Rent</option>
                    <option value="sell">Buy</option>
                    <option value="rent">Rent</option>
                    <option value="pg">PG</option>
                </select>

                <select class="selectpicker type-class" data-live-search="true" name="property-type" id="property-type">
                    <option disabled>Property Type</option>
                    @foreach($propertyType as $type)
                    <option value="{{$type}}">{{ucwords($type)}}</option>
                    @endforeach
                </select>

                <span><i class="fa-solid fa-magnifying-glass flex-items" id="search-btn"></i></span>
            </div>
            <div class="result-list">
                <ul>

                </ul>
            </div>
        </div>
        <div class="header-icon-list-section flex-items">
            <div class="icon-boxes apartment-icon flex-items">
                <img src="{{asset('public/assets/images/new-home-images/apartment.svg')}}" alt="">
                <p><a href="{{route('category.home', ['type' => Str::slug('apartment')])}}">Apartment</p></a>
            </div>
            <div class="icon-boxes apartment-icon flex-items">
                <img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">
                <a href="{{route('category.home', ['type' => Str::slug('independent house')])}}">
                    <p>Homes</p>
                </a>
            </div>
            <div class="icon-boxes apartment-icon flex-items">
                <img src="{{asset('public/assets/images/new-home-images/villa.svg')}}" alt="">
                <a href="{{route('category.home', ['type' => Str::slug('paying-guests')])}}">
                    <p>Rent/PG</p>
                </a>
            </div>
            <div class="icon-boxes apartment-icon flex-items">
                <img src="{{asset('public/assets/images/new-home-images/office.svg')}}" alt="">
                <a href="{{route('category.home', ['type' => Str::slug('office')])}}">
                    <p>Office</p>
                </a>
            </div>
        </div>



    </div>

    <div class="main-banner-right">
        <img src="{{asset('public/assets/images/new-home-images/banner1.jpg')}}" alt="">
    </div>
    <!-- </div> -->



</div>
<div class="explore-our-listing section-padding flex-items">
    <div class="main-container flex-items">
        <h2 class="heading2">Explore Popular Location </h2>
        <p class="para explore-heading-para headingPara">Discover ideal destinations for living, working, and exploring</p>



        <div class="citybox-container flex-items">
            @foreach($popularCities as $cityName)
            <a href="{{route('new.allProperty', ['name' => Str::slug($cityName)])}}" target="_blank">
                <div class="cities-box">
                    <div class="city-box flex-items">
                        @if(file_exists(public_path('assets/images/new-home-images/' . strtolower($cityName) . '.jpg')))
                        <img src="{{ asset('public/assets/images/new-home-images/' . strtolower($cityName) . '.jpg') }}" alt="">
                        @else
                        <?php
                        $defaultImages = [
                            'delhi.jpg',
                            'mumbai.jpg',
                            'chandigadh.jpg',
                            'punjab.jpg',
                            'himachal.jpg',
                            'haryana.jpg',
                            'gurgaon.jpg',
                            'noida.jpg'
                        ];

                        foreach ($popularCities as $city) {
                            $index = array_search(strtolower($city) . '.jpg', $defaultImages);
                            if ($index !== false) {
                                unset($defaultImages[$index]);
                            }
                        }
                        $randomImage = $defaultImages[array_rand($defaultImages)];
                        ?>

                        <img src="{{ asset('public/assets/images/new-home-images/' . $randomImage) }}" alt="">
                        @endif
                        <div class="city-box-para">
                            <h3 class="heading3">{{ucfirst($cityName)}}</h3>
                            <p>{{ $propertyCounts[$cityName] ?? '0' }} Listings</p>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

    </div>
</div>
<div class="looking-section section-padding">
    <div class="main-container">
        <h2 class="heading2">
            What Are You Looking For?
        </h2>
        <p class="para headingPara">Explore from Apartments, land, builder floors, PG , and more</p>
        <div class="looking-icon-box-container flex-items">
            <div class="looking-iconbox">
                <img src="{{asset('public/assets/images/new-home-images/apartments.svg')}}" alt="apartments">
                <h3 class="looking-heading">Apartment</h3>
                <p class="para">If you are looking good and budget friendly apartments then you will considered us. We have lot of options and varieties. </p>
                <a class="looking-btn" href="{{route('category.home', ['type' => Str::slug('apartment')])}}">View All</a>

            </div>
            <div class="looking-iconbox">
                <img src="{{asset('public/assets/images/new-home-images/family-house-1.svg')}}" alt="apartments">
                <h3 class="looking-heading">Houses</h3>
                <p class="para">Explore our affordable houses for sale or rent. Find your new home today with our extensive listing of budget-friendly options. </p>
                <a class="looking-btn" href="{{route('category.home', ['type' => Str::slug('independent house')])}}">View All</a>

            </div>
            <div class="looking-iconbox">
                <img src="{{asset('public/assets/images/new-home-images/office-store.svg')}}" alt="apartments">
                <h3 class="looking-heading">Offices</h3>
                <p class="para">Explore our list of office spaces for sale or rent. Find the perfect workspace to suit your business needs and goals. </p>
                <a class="looking-btn" href="{{route('category.home', ['type' => Str::slug('office')])}}">View All</a>

            </div>

        </div>

    </div>
</div>
<div class="client-cell section-padding section-color">
    <div class="main-container flex-items">
        <div class="client-cell-left">
            <h2 class="heading2">We Help You To Sell, Buy, Or Rent Properties Hassle-free</h2>
            <p class="para">We assist with hassle-free property sales, purchases, and rentals. Simplify your real estate transactions with our expert guidance and support. </p>
            <div class="client-check-boxes wide-range-list">
                <li class="client-check-box flex-items">
                    <i class="fa-solid fa-check flex-items"></i>24/7 Sigporn analatile

                </li>
                <li class="client-check-box flex-items">
                    <i class="fa-solid fa-check flex-items"></i>Expert Angel Supert From Us

                </li>
                <li class="client-check-box flex-items">
                    <i class="fa-solid fa-check flex-items "></i>Free Submission On Our Wette

                </li>
                <li class="client-check-box flex-items">
                    <i class="fa-solid fa-check flex-items"></i>Home Loans Assistance from our staff

                </li>


            </div>
            <div class="help-btn">
                <a href="#">List Your Property</a>
                <a href="#">Find Properties</a>

            </div>

        </div>
        <div class="client-cell-right flex-items">
            <div class="client-cell-leftbox ">
                <div class="sell-box">
                    <img src="{{asset('public/assets/images/new-home-images/family-house.png')}}" alt="home">
                    <h3>Buy A Home</h3>
                    <p class="para">Find the perfect home for your family's needs In Just Three Easy Steps.</p>

                </div>
                <div class="sell-box">
                    <img src="{{asset('public/assets/images/new-home-images/groups.png')}}" alt="home">
                    <h3>Sell Your Home</h3>
                    <p class="para">List your home On Our Reliable platform for sale and attract potential buyers quickly.</p>

                </div>


            </div>
            <div class="client-cell-rightbox">
                <div class="sell-box">
                    <img src="{{asset('public/assets/images/new-home-images/icons.png')}}" alt="home">
                    <h3>Search Properties</h3>
                    <p class="para">Explore available properties for sale or rent in your preferred location.</p>

                </div>

            </div>


        </div>


    </div>




</div>


<!-- latest property   -->


<div class="latest-properties section-padding chnage-class">
    <div class="main-container flex-items">
        <h2 class="heading2" id="title-latestProperties">Latest Properties</h2>
        <p class="para">Discover our newest properties on the market, updated regularly for you to find your perfect home or investment opportunity.</p>
        <div class="latest-properties-section">
            <div class="properties-tabs flex-items">
                <a href="" class="property-tab active"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 2" viewBox="0 0 32 32" width="256" height="256">
                        <path d="M30 15a1 1 0 0 1-.58-.19L16 5.23 2.58 14.81a1 1 0 0 1-1.16-1.62l14-10a1 1 0 0 1 1.16 0l14 10A1 1 0 0 1 30 15zM5 9a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h4a1 1 0 0 1 0 2H6v3a1 1 0 0 1-1 1z" class="color101820 svgShape"></path>
                        <path d="M25 29h-5a1 1 0 0 1-1-1v-7h-6v7a1 1 0 0 1-1 1H7a3 3 0 0 1-3-3V16a1 1 0 0 1 2 0v10a1 1 0 0 0 1 1h4v-7a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v7h4a1 1 0 0 0 1-1V16a1 1 0 0 1 2 0v10a3 3 0 0 1-3 3Z" class="color101820 svgShape"></path>
                    </svg>For Sale</a>
                <div class="property-tab"><img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">PG</div>
                <div href="" class="property-tab"><img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">Apartments</div>
                <div href="" class="property-tab"><img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">Houses</div>
                <div href="" class="property-tab"><img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">For Rent</div>
                <div href="" class="property-tab"><img src="{{asset('public/assets/images/new-home-images/homes.svg')}}" alt="">Office</div>


            </div>

            <div class="property-images-contianer active" id="latest-properties">
                @foreach($properties as $property)
                <div class="property-image-boxes">
                    <div id="assetPath" data-path="{{ asset('') }}"></div>
                    <div class="property-image-box">
                        @php $image = explode(',', $property->images); @endphp
                        @foreach($image as $img)
                        <img src="{{ asset('public/assets/property-images/' . $img) }}" alt="">
                        @break
                        @endforeach
                        <div class="featured-cells">
                            <div class="property-featured">Featured</div>
                            <div class="property-sales">Sales</div>
                        </div>
                        <div class="featured-icon">
                            <span class="featured-icon-box">
                                <i class="fa-solid fa-share-nodes"></i>
                            </span>
                            <span class="featured-icon-box">
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span class="featured-icon-box">
                                <i class="fa-solid fa-plus"></i>
                            </span>

                        </div>
                    </div>
                    <div class="feature-image-para">
                        <div class="featured-tags">
                            <span>{{ $property->looking_to == 'pg' ? ucwords($property->pg_for) : ucwords($property->categories_type) }},</span>
                            <span>{{ $property->looking_to }}</span>
                        </div>

                        <?php
                        if ($property->looking_to == 'pg') {
                            $setRoute = route('property', ['name' => Str::slug($property->pg_name), 'id' => base64_encode($property->id)]);
                        } else {
                            $setRoute = route('property', ['name' => Str::slug($property->property_name), 'id' => base64_encode($property->id)]);
                        }
                        ?>

                        <a href="{{$setRoute}}" target="_blank">
                            <h3>{{ implode(' ', array_slice(str_word_count($property->looking_to == 'pg' ? $property->pg_name : $property->property_name, 1), 0, 5)) }}</h3>
                        </a>
                        <h4 class="price"> {{$property->looking_to == 'sell' ? formatCost($property->cost) : formatRent($property->rent)}}</h4>

                        <p class="para">{{ ucwords(implode(', ', array_slice(explode(', ', $property['project_society']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $property['locality']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $property['city']), 0, 2))) }}</p>


                        <div class="bottom-features">
                            @if(in_array($property->categories_type, ['apartment', 'independent floor', 'independent house']))
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$property->total_property}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$property->bath}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$property->balconies}}</span>
                            <!-- <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">4 Cars</span> -->
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$property->built_up_area}} ft <sup>2</sup></span>
                            @elseif($property->categories_type == 'office')
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$property->max_seats}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$property->meeting_room}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$property->built_up_area}} ft <sup>2</sup></span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">{{$property->passengers_lifts}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$property->public_washrooms}}</span>
                            @elseif(in_array($property->categories_type, ['retail shop', 'showroom', 'warehouse']))

                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$property->staircase}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$property->your_floor}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$property->built_up_area}} ft <sup>2</sup></span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">{{$property->passengers_lifts}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$property->public_washrooms}}</span>
                            @elseif($property->looking_to == 'pg')
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$property->total_property}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$property->suited_for}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$property->meals_available}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">{{$property->bed_in_room}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$property->room_type}}</span>
                            @endif
                        </div>
                        <div class="features-contact">
                            <a class="feature-btn" href="tel:1234567890"><i class="fa-light fa-phone-volume"></i>Call</a>
                            <a class="feature-btn" href="mailto:test@gmail.com"><i class="fa-regular fa-envelope "></i>Email</a>
                            <a class="feature-btn feature-whatsapp" href="#"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<div class="confidence section-padding flex-items" style="--background-url: url('{{ asset('public/assets/images/new-home-images/family-image.png') }}'); background-image: linear-gradient(90deg, #00000050, #000000), var(--background-url);">
    <div class="main-container flex-items">
        <div class="confidence-left">

        </div>
        <div class="confidence-right">
            <h2 class="heading2">Buy Your Dream Home With Confidence</h2>
            <p class="para">Embark on your journey to acquire your dream home with absolute confidence. We provides comprehensive support and expertise, ensuring a seamless and satisfying buying experience tailored to your needs and preferences.</p>
            <a class="confidence-btn" href="#"> Explore Now</a>


        </div>


    </div>

</div>



<div class="localities section-padding section-color">
    <div class="main-container flex-items">
        <h2 class="heading2">Top Residential Localities Projects</h2>
        <p class="para">Featured Residential projects across India</p>
        <div class="localities-carousel-box">
            <div class="localities-box flex-items">
                <img src="{{asset('public/assets/images/new-home-images/localities-image.jpg.png')}}" alt="">
                <div class="localities-featured-box">
                    <div class="localities-featured">Featured</div>
                </div>
                <div class="localities-box-para">
                    <h4>Mantram Solacia</h4>
                    <p class="para">1,2 BHK Apartment, Panvel, Navi Mumbai</p>
                    <p class="price">₹ 43 - 72 Lacs</p>

                </div>


            </div>
            <div class="localities-box flex-items">
                <img src="{{asset('public/assets/images/new-home-images/localities-image.jpg.png')}}" alt="">
                <div class="localities-featured-box">
                    <div class="localities-featured">Featured</div>
                </div>
                <div class="localities-box-para">
                    <h4>Mantram Solacia</h4>
                    <p class="para">1,2 BHK Apartment, Panvel, Navi Mumbai</p>
                    <p class="price">₹ 43 - 72 Lacs</p>

                </div>


            </div>
            <div class="localities-box flex-items">
                <img src="{{asset('public/assets/images/new-home-images/localities-image.jpg.png')}}" alt="">
                <div class="localities-featured-box">
                    <div class="localities-featured">Featured</div>
                </div>
                <div class="localities-box-para">
                    <h4>Mantram Solacia</h4>
                    <p class="para">1,2 BHK Apartment, Panvel, Navi Mumbai</p>
                    <p class="price">₹ 43 - 72 Lacs</p>

                </div>


            </div>

        </div>


    </div>
</div>
<div class="property-container section-padding">
    <div class="main-container flex-items">
        <h2 class="heading2">Properties For Rent</h2>
        <p class="para">Discover a variety of rental properties tailored to your needs. From cozy apartments to spacious houses, we offer a range of options to suit your lifestyle and budget. Find your perfect rental home today.</p>
        <div class="rent-caraousel-parent">
            <div class="property-rent-carousel flex-items">
                @foreach($rentProperties as $data)
                <div class="property-rent-boxes">
                    <div class="property-rent-box">
                        <div class="property-rent-caraousel">
                            @php $image = explode(',', $data->images); @endphp
                            @foreach($image as $img)
                            <img src="{{ asset('public/assets/property-images/' . $img) }}" alt="" class="rent-image">
                            @endforeach
                            <!-- <img src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rent-image">
                            <img src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rent-image">
                            <img src="https://images.pexels.com/photos/186077/pexels-photo-186077.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="" class="rent-image"> -->

                        </div>

                        <div class="property-featured-cells">
                            <div class="property-section-featured">Featured</div>
                            <div class="property-section-sales">Sales</div>
                        </div>
                        <div class="navigation-icon">
                            <span class="property-icon-box scrol-icon-left">

                                <i class="fa-solid fa-chevron-left fa-fw"></i>
                            </span>
                            <span class="property-icon-box scrol-icon-right">
                                <i class="fa-solid fa-chevron-right fa-fw"></i>

                            </span>


                        </div>

                    </div>
                    <div class="feature-image-para">
                        <div class="property-featured-tags">
                            <span>{{ $data->looking_to == 'pg' ? ucwords($data->pg_for) : ucwords($data->categories_type) }},</span><span>{{ $data->looking_to }}</span>
                        </div>

                        <?php
                        if ($data->looking_to == 'pg') {
                            $setRoute = route('property', ['name' => Str::slug($data->pg_name), 'id' => base64_encode($data->id)]);
                        } else {
                            $setRoute = route('property', ['name' => Str::slug($data->property_name), 'id' => base64_encode($data->id)]);
                        }
                        ?>

                        <a href="{{$setRoute}}" target="_blank">
                            <h3>{{ implode(' ', array_slice(str_word_count($data->looking_to == 'pg' ? $data->pg_name : $data->property_name, 1), 0, 5)) }}</h3>
                        </a>
                        <h4 class="property-price">{{ formatRent($data->rent)}}</h4>
                        <p class="para">{{ ucwords(implode(', ', array_slice(explode(', ', $data['project_society']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $data['locality']), 0, 2))) }}, {{ ucwords(implode(', ', array_slice(explode(', ', $data['city']), 0, 2))) }}
                        </p>
                        <div class="bottom-features">
                            @if(in_array($data->categories_type, ['apartment', 'independent floor', 'independent house']))
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$data->total_property}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$data->bath}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$data->balconies}}</span>
                            <!-- <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">4 Cars</span> -->
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$data->built_up_area}} ft <sup>2</sup></span>
                            @elseif($data->categories_type == 'office')
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$data->max_seats}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$data->meeting_room}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$data->built_up_area}} ft <sup>2</sup></span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">{{$data->passengers_lifts}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$data->public_washrooms}}</span>
                            @elseif(in_array($data->categories_type, ['retail shop', 'showroom', 'warehouse']))
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">{{$data->staircase}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">{{$data->your_floor}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">{{$data->built_up_area}} ft <sup>2</sup></span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon4.png')}}" alt="icon">{{$data->passengers_lifts}}</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon5.png')}}" alt="icon">{{$data->public_washrooms}}</span>
                            @endif
                        </div>
                        <div class="features-contact">
                            <a class="feature-btn" href="tel:1234567890"><i class="fa-light fa-phone-volume"></i>Call</a>
                            <a class="feature-btn" href="mailto:test@gmail.com"><i class="fa-regular fa-envelope "></i>Email</a>
                            <a class="feature-btn feature-whatsapp" href="#"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>


                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="featured-properties section-padding">
    <div class="main-container flex-items">
        <h2 class="heading2">Featured Properties</h2>
        <p class="para">Discover special homes selected for their quality and unique features for you only. Find your perfect home among our top listings today. </p>
        <div class="feature-box-images-container flex-items">
            <div class="featured-properties-images-box">
                <div class="property-image-boxx flex-items">
                    <div class="property-image-box-left">
                        <img src="{{asset('public/assets/images/new-home-images/localities-image.jpg.png')}}" alt="">
                        <div class="featured-container-strip">Featured</div>
                    </div>
                    <div class="property-image-box-right">
                        <h3>Luxury 6 Bed Mansion in Palm Jumeira</h3>
                        <p class="price">AED 5,500,000</p>
                        <p class="para">Beautiful, updated, ground level Co-op apartment in the desirable Bay Terrace neighborhood ...</p>
                        <div class="featured-icon">
                            <span class="featured-icon-box">
                                <i class="fa-solid fa-share-nodes"></i>
                            </span>
                            <span class="featured-icon-box">
                                <i class="fa-regular fa-heart"></i>
                            </span>

                        </div>
                        <div class="bottom-features">
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">5</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">5</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">29,000 ft <sup>2</sup></span>

                        </div>



                    </div>


                </div>

            </div>
            <div class="featured-properties-images-box">
                <div class="property-image-boxx flex-items">
                    <div class="property-image-box-left">
                        <img src="{{asset('public/assets/images/new-home-images/localities-image.jpg.png')}}" alt="">
                        <div class="featured-container-strip">Featured</div>

                    </div>
                    <div class="property-image-box-right">
                        <h3>Luxury 6 Bed Mansion in Palm Jumeira</h3>
                        <p class="price">AED 5,500,000</p>
                        <p class="para">Beautiful, updated, ground level Co-op apartment in the desirable Bay Terrace neighborhood ...</p>
                        <div class="featured-icon">
                            <span class="featured-icon-box">
                                <i class="fa-solid fa-share-nodes"></i>
                            </span>
                            <span class="featured-icon-box">
                                <i class="fa-regular fa-heart"></i>
                            </span>

                        </div>
                        <div class="bottom-features">
                            <span><img src="{{asset('public/assets/images/new-home-images/icon1.png')}}" alt="icon">5</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon2.png')}}" alt="icon">5</span>
                            <span><img src="{{asset('public/assets/images/new-home-images/icon3.png')}}" alt="icon">29,000 ft <sup>2</sup></span>

                        </div>



                    </div>


                </div>
            </div>

        </div>

    </div>
</div>

<div class="sell-your-home section-padding" style="background-image: url('{{ asset('public/assets/images/new-home-images/sell-your-home.png') }}');">
    <div class="main-container flex-items">
        <div class="sell-your-left">
            <h2 class="heading2">Sell Your Home Securely and Stress-Free</h2>
            <p class="para">Are you curious about the precise value of your home or its potential selling price? Benefit from
                our extensive expertise in the luxury home market.</p>
            <a class="confidence-btn" href="#">List Now</a>
        </div>
        <div class="sell-your-right">
        </div>
    </div>
</div>
<div class="why-choose-us section-padding">
    <div class="main-container flex-items">
        <h2 class="heading2">Why Choose Us</h2>
        <p class='para'>our expertise, reliability, and personalized service tailored to meet your needs, ensuring a smooth and successful real estate experience.</p>
        <div class="choose-icon-box-container flex-items">
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/apartment.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">wide Range Of Properties</h3>
                    <p class="para">Our diverse selection of properties, offering something for every preference, budget, and lifestyle. </p>
                </div>

            </div>
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/financing.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">Financing Made Easy</h3>
                    <p class="para">Streamlined financing options to simplify your property purchase process. </p>
                </div>

            </div>
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/trusted.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">Trusted By Thousands</h3>
                    <p class="para">Chosen and relied upon by thousands for our expertise, reliability, and exceptional service. </p>
                </div>

            </div>
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/verified.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">Verified Brokers</h3>
                    <p class="para">Certified brokers providing trusted and verified services, ensuring a secure and transparent real estate experience. </p>
                </div>

            </div>
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/transparency.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">100% Transparency</h3>
                    <p class="para">We guarantee complete transparency in all transactions, providing clarity and confidence throughout the process. </p>
                </div>

            </div>
            <div class="choose-icon-box flex-items">
                <div class="icon-choose"><img src="{{asset('public/assets/images/new-home-images/property-near.png')}}" alt=""></div>
                <div class="para-choose">
                    <h3 class="heading3">Properties Near By You</h3>
                    <p class="para">Discover properties conveniently located near you, offering ease of access and proximity to amenities. </p>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="testimonial section-color section-padding">
    <div class="main-container flex-items">
        <h2 class="heading2">Testimonials</h2>
        <p class="para">feedback from our pleased buyers, tenants, owners, and dealers to learn about their positive experiences with us.</p>
        <div class="testimonial-caraousel">
            <div class="caraousel-lists flex-items">
                <div class="testimonial-content">
                    <div class="testimonial-image-box flex-items">
                        <div class="image-box-left">
                            <img src="{{asset('public/assets/images/new-home-images/client.jpg')}}" alt="">
                        </div>
                        <div class="image-box-right">
                            <h3>Susan Barkley</h3>
                            <p>Happy buyer, Germany</p>
                        </div>

                    </div>
                    <div class="testimonial-para-content">
                        <p class="para">The WP Estate team did an outstanding job
                            helping me buy my first home. The high level of
                            service and dedication to seeing things done the
                            right way is what I look for in an agent.
                        </p>
                    </div>
                    <div class="testimonial-rating">
                        <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span>
                    </div>

                </div>
                <div class="testimonial-content">
                    <div class="testimonial-image-box flex-items">
                        <div class="image-box-left">
                            <img src="{{asset('public/assets/images/new-home-images/client.jpg')}}" alt="">
                        </div>
                        <div class="image-box-right">
                            <h3>Susan Barkley</h3>
                            <p>Happy buyer, Germany</p>
                        </div>

                    </div>
                    <div class="testimonial-para-content">
                        <p class="para">The WP Estate team did an outstanding job
                            helping me buy my first home. The high level of
                            service and dedication to seeing things done the
                            right way is what I look for in an agent.
                        </p>
                    </div>
                    <div class="testimonial-rating">
                        <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span>
                    </div>

                </div>
                <div class="testimonial-content">
                    <div class="testimonial-image-box flex-items">
                        <div class="image-box-left">
                            <img src="{{asset('public/assets/images/new-home-images/client.jpg')}}" alt="">
                        </div>
                        <div class="image-box-right">
                            <h3>Susan Barkley</h3>
                            <p>Happy buyer, Germany</p>
                        </div>

                    </div>
                    <div class="testimonial-para-content">
                        <p class="para">The WP Estate team did an outstanding job
                            helping me buy my first home. The high level of
                            service and dedication to seeing things done the
                            right way is what I look for in an agent.
                        </p>
                    </div>
                    <div class="testimonial-rating">
                        <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span> <span><i class="fa-solid fa-star"></i></span>
                    </div>

                </div>

            </div>

        </div>


    </div>
</div>
<div class="latest section-padding">
    <div class="main-container flex-items">
        <h2 class="heading2">Latest News - Indian Real Estate</h2>
        <p class="para">Stay up to date with the latest Real Estate Happenings.</p>
        <div class="news-strip flex-items">
            @foreach($latestNews as $news)
            <div class="strip-image-container">
                <div class="new-image-box">
                    <img src="{{ asset('uploads/images/'.$news->images) }}" alt="">
                </div>
                <div class="news-para">
                    <a href="{{route('project.single.blog', ['name' => Str::slug($news->blog_name)])}}">
                        <h3>{{ucwords($news->blog_name)}}</h3>
                    </a>
                    <p class="para">{{ ucwords(implode(' ', array_slice(str_word_count($news->blog_description, 1), 0, 20))) }} ...</p>

                    <p class="published">published on {{ $news->created_at->format('F, d, Y') }}</p>

                </div>
            </div>
            @endforeach

        </div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    let dropdown = document.getElementsByClassName('result-list');
    let searchbox = document.getElementById('search-bar-field')
    const body = document.body
    searchbox.addEventListener('keyup', (e) => {
        dropdown[0].classList.add('show-class');
        e.stopPropagation();
    });
    body.addEventListener('click', (e) => {
        if (!searchbox.contains(e.target)) {
            dropdown[0].classList.remove('show-class');
        }
    });




    // let right = document.querySelector(".scrol-icon-right");
    // let left = document.querySelector(".scrol-icon-left");
    // let imageCaraousel = document.querySelector('.property-rent-caraousel');
    // let images = document.querySelectorAll('.rent-image');
    // let length = images.length;
    // let count = 1;



    // right.addEventListener('click', () => {
    //     if (count < length) {
    //         imageCaraousel.style.transform = `translateX(-${count*380}px)`;
    //         count++;
    //     } else {
    //         imageCaraousel.style.transform = `translateX(0px)`;
    //         count = 0;

    //     }
    // })
    // left.addEventListener('click', () => {
    //     if (count > 1) {

    //         imageCaraousel.style.transform = `translateX(-${(count-2)*380}px)`;
    //         count--;
    //     } else {
    //         imageCaraousel.style.transform = `translateX(-${(length-1)*380}px)`;
    //         count = length;

    //     }
    // })

    // let right1 = document.querySelector(".scrol-icon-right1");
    // let left1 = document.querySelector(".scrol-icon-left1");
    // let imageCaraousel1 = document.querySelector('.property-rent-caraousel1');
    // let images1 = document.querySelectorAll('.rent-image1');
    // let length1 = images1.length;
    // let count1 = 1;

    // right1.addEventListener('click', () => {
    //     if (count1 < length1) {
    //         imageCaraousel1.style.transform = `translateX(-${count1*380}px)`;
    //         count1++;
    //     } else {
    //         imageCaraousel1.style.transform = `translateX(0px)`;
    //         count1 = 0;

    //     }
    // })
    // left1.addEventListener('click', () => {
    //     if (count1 > 1) {

    //         imageCaraousel1.style.transform = `translateX(-${(count1-2)*380}px)`;
    //         count1--;
    //     } else {
    //         imageCaraousel1.style.transform = `translateX(-${(length1-1)*380}px)`;
    //         count1 = length1;

    //     }
    // })


    // let right2 = document.querySelector(".scrol-icon-right2");
    // let left2 = document.querySelector(".scrol-icon-left2");
    // let imageCaraousel2 = document.querySelector('.property-rent-caraousel2');
    // let images2 = document.querySelectorAll('.rent-image2');
    // let length2 = images2.length;
    // let count2 = 1;

    // right2.addEventListener('click', () => {
    //     if (count2 < length2) {
    //         imageCaraousel2.style.transform = `translateX(-${count2*380}px)`;
    //         count2++;
    //     } else {
    //         imageCaraousel2.style.transform = `translateX(0px)`;
    //         count2 = 0;

    //     }
    // })
    // left2.addEventListener('click', () => {
    //     if (count2 > 1) {

    //         imageCaraousel2.style.transform = `translateX(-${(count2-2)*380}px)`;
    //         count2--;
    //     } else {
    //         imageCaraousel2.style.transform = `translateX(-${(length2-1)*380}px)`;
    //         count2 = length2;

    //     }
    // })



    // <------ Content Slider------->

    const RentCaraousel = document.getElementsByClassName('property-rent-carousel');
    const rentboxes = document.querySelectorAll('.property-rent-boxes');
    const rentlength = rentboxes.length;

    let num = 1;

    const caraouselInt = () => {
        if ((num + 2) < rentlength) {

            RentCaraousel[0].style.transform = `translatex(-${num*415}px)`;
            num++;
        } else {
            RentCaraousel[0].style.transform = `translatex(0px)`;
            num = 0;

        }

    }
    setInterval(() => {
        caraouselInt();
    }, 2000);


    const tabs = document.querySelectorAll('.property-tab');
    const all_content = document.querySelectorAll('.property-images-contianer');

    tabs.forEach((tab, index) => {
        tab.addEventListener('click', () => {
            tabs.forEach(tab => {
                tab.classList.remove('active')
            })
            tab.classList.add('active')


            all_content.forEach(content => {
                content.classList.remove('active')
            })
            all_content[index].classList.add('active');
        });
    });
</script>


<script>
    var searchInput = document.getElementById("search-bar-field");
    var locationSelect = document.getElementById("location");
    var assetPath = document.getElementById('assetPath').getAttribute('data-path');
    var lookingSelect = document.getElementById('looking-to');
    var categoryType = document.getElementById("property-type");

    document.addEventListener("DOMContentLoaded", function() {
        updateProperties();
    });

    if (categoryType) {
        categoryType.addEventListener("change", function() {

            updateProperties();
        });
    }

    if (lookingSelect) {
        lookingSelect.addEventListener("change", function() {
            updateProperties();
        });
    }

    if (locationSelect) {
        locationSelect.addEventListener("change", function() {
            if (searchInput) {
                searchInput.classList.toggle("d-none", this.value === "");
            }
            updateProperties();
        });
    }

    function updateProperties() {
        var location = $('#location').val();
        var lookingTo = $('#looking-to').val();
        var propertyType = $('#property-type').val();
        fetchProperties(location, lookingTo, propertyType);
    }


    function fetchProperties(location, lookingTo, propertyType) {
        $.ajax({
            url: "{{route('location.properties')}}",
            type: "POST",
            data: {
                location: location,
                lookingTo: lookingTo,
                type: propertyType,
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                //console.log(response);
                if (response.success) {
                    if (response.properties.length > 0) {
                        var properties = response.properties;
                        appendProperties(properties, assetPath);
                        var cityName = location.charAt(0).toUpperCase() + location.slice(1).toLowerCase();
                        $('#title-latestProperties').text('Latest Properties in ' + cityName);
                        $('.chnage-class').removeClass('d-none');
                    } else {
                        $('.chnage-class').addClass('d-none');
                    }
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
            }
        });
    }




    function appendProperties(properties, assetPath) {

        var latestProperty = $('#latest-properties');
        latestProperty.empty();

        properties.forEach(function(property) {



            function formatRent(rent) {
                if (!isNaN(rent) && rent !== '') {
                    if (rent >= 10000000) {
                        return (rent / 10000000).toFixed(2) + ' Cr';
                    } else if (rent >= 100000) {
                        return (rent / 100000).toFixed(2) + ' Lac';
                    } else if (rent >= 1000) {
                        return (rent / 1000).toFixed(2) + 'k';
                    } else {
                        return rent.toLocaleString('en-IN', {
                            style: 'currency',
                            currency: 'INR'
                        });
                    }
                } else {
                    return '';
                }
            }

            function formatCost(cost) {

                if (!isNaN(cost) && cost !== '') {
                    if (cost >= 10000000) {
                        return (cost / 10000000).toFixed(2) + ' Cr';
                    } else if (cost >= 100000) {
                        return (cost / 100000).toFixed(2) + ' Lac';
                    } else if (cost >= 1000) {
                        return (cost / 1000).toFixed(2) + 'k';
                    } else {
                        return cost.toLocaleString('en-IN', {
                            style: 'currency',
                            currency: 'INR'
                        });
                    }
                } else {
                    return '';
                }

            }

            function capitalizeFirstLetter(text) {
                if (text && typeof text === 'string') {
                    return text.split(' ').map(function(word) {
                        return word.charAt(0).toUpperCase() + word.slice(1);
                    }).join(' ');
                } else {
                    return '';
                }
            }


            function truncateText(text, wordsCount) {
                var words = text.split(' ');

                if (words.length > wordsCount) {
                    words = words.slice(0, wordsCount);
                }

                return words.join(' ');
            }


            function formatPropertyName(propertyName) {
                if (propertyName && typeof propertyName === 'string') {
                    propertyName = propertyName.charAt(0).toUpperCase() + propertyName.slice(1);
                    var words = propertyName.split(' ');
                    if (words.length > 5) {
                        words = words.slice(0, 5);
                    }
                    return words.join(' ');
                } else {
                    return '';
                }
            }

            if (property.looking_to === 'rent' || property.looking_to === 'pg') {
                var formattedRent = formatRent(property.rent);
            } else {
                var formattedCost = formatCost(property.cost);
            }



            project_society = truncateText(capitalizeFirstLetter(property.project_society), 4);
            locality = truncateText(capitalizeFirstLetter(property.locality), 4);
            city = capitalizeFirstLetter(property.city);
            category = capitalizeFirstLetter(property.categories_type);
            lookingTo = capitalizeFirstLetter(property.looking_to);
            pgFor = capitalizeFirstLetter(property.pg_for);

            var formattedName = formatPropertyName(property.property_name);
            var pgName = formatPropertyName(property.pg_name);

            if (property.categories_type === 'apartment' || property.categories_type === 'independent floor' || property.categories_type === 'independent house') {

                var residentiolFeatures = '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon1.png" alt="icon">' + property.total_property + ' </span>';
                residentiolFeatures += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon2.png" alt="icon">' + property.bath + ' </span>';
                residentiolFeatures += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon3.png" alt="icon">' + property.balconies + ' </span>';
                residentiolFeatures += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon5.png" alt="icon">' + property.built_up_area + ' </span>';
            } else if (property.categories_type === 'office') {
                var officeFeature = '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon1.png" alt="icon">' + property.max_seats + ' </span>';
                officeFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon2.png" alt="icon">' + property.meeting_room + ' </span>';
                officeFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon3.png" alt="icon">' + property.built_up_area + ' ft <sup>2</sup> </span>';
                officeFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon4.png" alt="icon">' + property.passengers_lifts + '</span>';
                officeFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon5.png" alt="icon">' + property.public_washrooms + '</span>';
            } else if (property.categories_type === 'retail shop' || property.categories_type === 'showroom' || property.categories_type === 'warehouse') {

                var commercialFeature = '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon1.png" alt="icon">' + property.staircase + ' </span>';
                commercialFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon2.png" alt="icon">' + property.your_floor + ' </span>';
                commercialFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon3.png" alt="icon">' + property.built_up_area + ' ft <sup>2</sup> </span>';
                commercialFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon4.png" alt="icon">' + property.passengers_lifts + ' </span>';
                commercialFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon5.png" alt="icon">' + property.public_washrooms + ' </span>';

            } else if (property.looking_to === 'pg') {

                var PGFeature = '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon1.png" alt="icon">' + property.total_property + ' </span>';
                PGFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon2.png" alt="icon">' + property.suited_for + ' </span>';
                PGFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon3.png" alt="icon">' + property.meals_available + ' </span>';
                PGFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon4.png" alt="icon">' + property.bed_in_room + ' </span>';
                PGFeature += '<span><img src="' + assetPath + '/public/assets/images/new-home-images/icon5.png" alt="icon">' + property.room_type + ' </span>';

            }

            var imagePath = "{{ asset('public/assets/property-images/') }}";

            var propertyHtml = '<div class="property-image-boxes">';
            propertyHtml += ' <div class="property-image-box">';
            var images = property.images.split(',');
            propertyHtml += '<img src="' + imagePath + '/' + images[0] + '" alt="">';
            propertyHtml += '<div class="featured-cells">';
            propertyHtml += '<div class="property-featured">Featured</div>';
            propertyHtml += '<div class="property-sales">Sales</div>';
            propertyHtml += '</div>';
            propertyHtml += '<div class="featured-icon"><span class="featured-icon-box">';
            propertyHtml += '<i class="fa-solid fa-share-nodes"></i></span><span class="featured-icon-box">';
            propertyHtml += '<i class="fa-regular fa-heart"></i></span><span class="featured-icon-box">';
            propertyHtml += '<i class="fa-solid fa-plus"></i></span></div>';
            propertyHtml += '</div>';
            propertyHtml += '<div class="feature-image-para">';
            propertyHtml += '<div class="featured-tags">';
            propertyHtml += '<span>' + (category ? category : pgFor) + ', ';
            propertyHtml += '<span>' + lookingTo + '';
            propertyHtml += '</div>';
            propertyHtml += '<h3>' + (formattedName ? formattedName : pgName) + '</h3>';
            propertyHtml += '<h4 class="price"> ₹' + (formattedRent ? formattedRent : formattedCost) + ' </h4>'
            propertyHtml += '<p class="para"> ' + project_society + ', ' + locality + ', ' + city + ' </p>';

            propertyHtml += '<div class="bottom-features">';

            if (property.categories_type === 'apartment' || property.categories_type === 'independent floor' || property.categories_type === 'independent house') {
                propertyHtml += residentiolFeatures;
            } else if (property.categories_type === 'office') {
                propertyHtml += officeFeature;
            } else if (property.categories_type === 'retail shop' || property.categories_type === 'showroom' || property.categories_type === 'warehouse') {
                propertyHtml += commercialFeature;
            } else if (property.looking_to === 'pg') {
                propertyHtml += PGFeature;
            }


            propertyHtml += '</div>';
            propertyHtml += '</div>';
            propertyHtml += '</div>';

            latestProperty.append(propertyHtml);
        });
    }
</script>

<script>
    $(document).ready(function() {
        $('#search-bar-field').keyup(function() {
            var search = $('#search-bar-field').val();
            var lookingTo = $('#looking-to').val();
            var propertyType = $('#property-type').val();
            var location = $('#location').val();

            $.ajax({
                url: "{{route('home.filter')}}",
                type: "POST",
                data: {
                    search: search,
                    lookingTo: lookingTo,
                    type: propertyType,
                    location: location,
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response) {
                    //console.log(response);
                    if (response.success) {
                        if (response.results.length > 0) {
                            var resultList = $('.result-list ul');
                            resultList.empty();

                            $.each(response.results, function(index, property) {

                                var encodedProjectSociety = encodeURIComponent(property.project_society.toLowerCase()).replace(/%20/g, '-');
                                var encodeLooking = property.looking_to;
                                var propertyRoute = "{{ url('project-locality') }}/" + encodedProjectSociety + '/' + encodeLooking;

                                var listItem = $('<li></li>').append($('<a></a>')
                                    .attr('href', propertyRoute)
                                    .text(property.project_society)
                                    .on('click', function() {
                                        var projectSociety = property.project_society;
                                    })
                                ).append(' - ' + property.locality);
                                resultList.append(listItem);

                            });

                        } else {
                            $('.result-list ul').empty().append('<li>No results found.</li>');
                        }
                    } else {
                        console.error('Error fetching results');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(error);
                }
            })
        });
    });
</script>

<script>
    $(document).ready(function() {

        $('#looking-to').on('change', function() {
            var lookingTo = $(this).val();
        });

        $('#search-btn').click(function() {
            var city = $('#location').val();
            var lookingTo = $('#looking-to').val();
            var type = $('#property-type').val();

            var baseUrl = window.location.origin + window.location.pathname;
            if (city !== 'Location') {
                var newUrl = baseUrl + 'home/' + encodeURIComponent(city) + '/' + encodeURIComponent(lookingTo) + '/' + encodeURIComponent(type);
                window.location.href = newUrl;
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputField = document.getElementById('search-bar-field');
        const locationDropdown = document.getElementById('location');

        // Function to set a cookie
        function setCookie(name, value, days) {
            const d = new Date();
            d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + d.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/";
        }

        // Function to get a cookie
        function getCookie(name) {
            const cname = name + "=";
            const decodedCookie = decodeURIComponent(document.cookie);
            const ca = decodedCookie.split(';');
            for (let i = 0; i < ca.length; i++) {
                let c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(cname) == 0) {
                    return c.substring(cname.length, c.length);
                }
            }
            return "";
        }

        // Check if a city is already selected (from the cookie)
        const selectedCity = getCookie('selectedCity');
        if (selectedCity) {
            inputField.classList.remove('d-none');
            locationDropdown.value = selectedCity;
        } else {
            inputField.classList.add('d-none');
        }

        // Add event listener to the dropdown  Cookie expires in 7 days
        locationDropdown.addEventListener('change', function() {
            const selectedCity = locationDropdown.value;
            if (selectedCity !== 'Location') {
                setCookie('selectedCity', selectedCity, 7);
                inputField.classList.remove('d-none');
            } else {
                inputField.classList.add('d-none');
            }
        });
        //console.log(selectedCity);
    });
</script>

@endsection