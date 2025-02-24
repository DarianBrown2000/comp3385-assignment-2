@extends('layouts.email')

@section('content')
<p>{{ $name }} has sent feedback about your website. Below are the comments left by
<p>{{ $comment }}</p>
@endsection