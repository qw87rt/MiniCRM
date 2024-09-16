@extends('layouts.app')

@section('content')
<h1>Company Details</h1>
<p><strong>Name:</strong> {{ $company->name }}</p>
<p><strong>Email:</strong> {{ $company->email }}</p>
<p><strong>Website:</strong> {{ $company->website }}</p>
<p><strong>Logo:</strong></p>
@if ($company->logo)
    <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="100">
@else
    No Logo
@endif
<a href="{{ route('companies.index') }}" class="btn btn-secondary mt-3">Back to List</a>
@endsection
