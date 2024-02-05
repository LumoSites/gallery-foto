@extends('dashboard.layouts.main')

@section('title', 'Dashboard')

@section('content')

    <style>
        .content {
            height: 50vh;
        }
    </style>

    <section class="container-fluid py-5">
        <div class="container text-center content">
            <h1>Hello {{ Auth::user()->username }} 👋</h1>

            <p>senang bertemu dengan anda lagi😊.</p>
        </div>
    </section>

@endsection
