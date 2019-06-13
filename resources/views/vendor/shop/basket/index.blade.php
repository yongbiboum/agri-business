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
    <?= $aibody['catalog/slide'] ?>
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
