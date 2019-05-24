@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['basket/mini'] ?>
    <?= $aiheader['catalog/filter'] ?>
    <?= $aiheader['catalog/lists'] ?>
@stop

@section('aimeos_stage')
    <?= $aibody['catalog/filter'] ?>
    <?= $aibody['catalog/logo'] ?>
    <?= $aibody['basket/mini'] ?>
@stop
@section('aimeos_nav')
    <?= $aibody['catalog/nav'] ?>
@stop
@section('aimeos_slide')
    <?= $aibody['catalog/slide'] ?>
@stop
@section('aimeos_left_side')
    <?= $aibody['catalog/categories'] ?>
@stop
@section('aimeos_body')
    <?= $aibody['catalog/catlist'] ?>
@stop
@section('aimeos_footer')
    <?= $aibody['catalog/footer'] ?>
@stop
