@extends('layouts.app')

@section('content')
<h1>Edit Employee</h1>
<form action="{{ route('employees.update', $employee) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $employee->first_name) }}" required>
    </div>
