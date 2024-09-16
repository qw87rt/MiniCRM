@extends('layouts.app')

@section('content')
<h1>Edit Company</h1>
<form action="{{ route('companies.update', $company) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $company->name) }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $company->email) }}">
    </div>
    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $company->website) }}">
    </div>
    <div class="form-group">
        <label for="logo">Logo</label>
        <input type="file" name="logo" id="logo" class="form-control">
        @if ($company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="{{ $company->name }}" width="100" class="mt-2">
        @endif
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
