@extends('layouts.opp')

@include('inc.header')

@if (Request::is('/'))
@include('inc.hero')
@endif

@include('inc.aboutme')

@include('inc.skills')

@include('inc.services')

@include('inc.portfolio')

@include('inc.contact')


@include('inc.footer')
