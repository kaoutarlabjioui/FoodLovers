@extends('client.layouts')

@section('title', 'Payment Successful')
@section('content')
    <h1>Payment Successful</h1>

    <!-- Display the success message, if available -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <p>Your payment has been processed successfully.</p>
    <!-- You can customize this view further with additional information or a thank you message. -->
@endsection('content')
