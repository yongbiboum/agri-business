@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['basket/standard'] ?>
    <?= $aiheader['basket/related'] ?>
@stop
@section('aimeos_stage')
    <?= $aibody['catalog/filter'] ?>
    <?= $aibody['catalog/logo'] ?>

@stop

@section('aimeos_slide')
    <div class="shop-banner banner-adv line-scale zoom-image">
        <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/camion2.png" alt="" /></a>
        <div class="banner-info">
            <h2 class="title30 color">Plateforme marchande</h2>
            <div class="bread-crumb "><a href="/list" >Marché</a><span>Cargaison</span></div>
        </div>
    </div>
@stop
@section('aimeos_nav')
    <?= $aibody['catalog/nav'] ?>
@stop

@section('aimeos_body')
    <?= $aibody['basket/standard'] ?>
    <?= $aibody['basket/related'] ?>
@stop
@section('aimeos_footer')
    <?= $aibody['catalog/footer'] ?>
@stop
