@extends('layouts.index')
    <!-- Profile section -->
@push('styles')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .profile-page {
        text-align: center;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        margin: 20px auto;
    }

    .profile-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .profile-name {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .calendar-container {
        margin-bottom: 20px;
    }

    .sign-out-button {
        background-color: #ff4444;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        display: block;
        margin: 0 auto;
    }
</style>
@endpush
@section('content')
<div class="container mt-5">
    <div class="profile-image">
        <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTedZtczgKEfbxG6o0Q_CwcWMQxSNJCepq_Ncn_aI6mWavUceT8" alt="Profile Image">
    </div>
    <h3 class="profile-name text-center">{{ $username }}</h3>
    <div class="profile-container-element d-flex flex-row justify-content-between mt-5 mb-5">
        <div class="monthly-journal border rounded bg-light shadow-sm p-3 mb-3">
            <p>Monthly Journal Entries</p>
            <p>{{ $total_entrries_montyly }}</p>
        </div>
        <div class="total-word-count border rounded bg-light shadow-sm p-3 mb-3">
            <p>Total Words Count</p>
            <p>{{ $total_word_count }}</p>
        </div>
        <div class="total-goal-complete border rounded bg-light shadow-sm p-3 mb-3">
            <p>Total Goal Complete</p>
            <p>{{ $total_goal_completed }}</p>
        </div>
        <div class="total-goal-not-complete border rounded bg-light shadow-sm p-3 mb-3">
            <p>Total Goal Not Complete</p>
            <p>{{ $total_goal_not_completed }}</p>
        </div>
        <div class="emotional-report border rounded bg-light shadow-sm p-3 mb-3">
            <p>Emotional Report</p>
            <p>{{ $emotional_report }}</p>
        </div>
    </div>
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="sign-out-button">Sign Out</button>
    </form>
</div>
@endsection
  