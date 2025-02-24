@extends('layouts.app')

@section('content')
    <h2>Feedback Form</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/feedback/send') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}" required>
        <textarea name="comment" placeholder="Your Feedback" required>{{ old('comment') }}</textarea>
        <button type="submit">Send Feedback</button>
    </form>
@endsection
