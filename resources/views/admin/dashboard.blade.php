@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="content-header"><h1>Teacher Training Management Dashboard</h1></div>
<div class="row">
    <div class="col-md-3"><div class="small-box bg-info"><div class="inner"><h3>{{ $programCount }}</h3><p>Programs</p></div></div></div>
    <div class="col-md-3"><div class="small-box bg-success"><div class="inner"><h3>{{ $classCount }}</h3><p>Classes</p></div></div></div>
    <div class="col-md-3"><div class="small-box bg-warning"><div class="inner"><h3>{{ $trainerCount }}</h3><p>Trainers</p></div></div></div>
    <div class="col-md-3"><div class="small-box bg-danger"><div class="inner"><h3>{{ $teacherCount }}</h3><p>Teachers</p></div></div></div>
</div>
@endsection
