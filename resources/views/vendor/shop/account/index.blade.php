@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['basket/mini'] ?>
    <?= $aiheader['account/profile'] ?>
    <?= $aiheader['account/subscription'] ?>
    <?= $aiheader['account/history'] ?>
    <?= $aiheader['account/favorite'] ?>
    <?= $aiheader['account/watch'] ?>
    <?= $aiheader['catalog/session'] ?>

@stop

@section('aimeos_stage')
    <?= $aibody['catalog/filter'] ?>
    <?= $aibody['catalog/logo'] ?>
@stop

@section('aimeos_nav')
    <?= $aibody['catalog/nav'] ?>
@stop

@section('aimeos_slide')
    <div class="shop-banner banner-adv line-scale zoom-image">
        <a href="#" class="adv-thumb-link"><img src="/packages/assets/images/shop/customer.png" alt="" /></a>
        <div class="banner-info">
            <h2 class="title30 color">Gestion du compte</h2>
            <div class="bread-crumb white"><a href="#" class="white">Accueil</a><span>Compte Client</span></div>
        </div>
    </div>
@stop

@section('aimeos_head')
    <?= $aibody['basket/mini'] ?>
@stop

@section('aimeos_left_side')
    <?= $aibody['account/accountaside'] ?>
@stop

@section('aimeos_body')
    <?= $aibody['account/accountlist'] ?>
    <?= $aibody['catalog/session'] ?>

@stop


@section('aimeos_footer')
    <?= $aibody['catalog/footer'] ?>
@stop
