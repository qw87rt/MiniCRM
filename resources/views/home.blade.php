@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <!-- Welcome Message -->
                        <div class="col-md-12 mb-4">
                            <h2>Welcome, {{ Auth::user()->name }}!</h2>
                            <p>{{ __('You are logged in and ready to manage the system.') }}</p>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="card text-white bg-primary">
                                        <div class="card-header">Manage Companies</div>
                                        <div class="card-body">
                                            <h5 class="card-title">View and manage companies</h5>
                                            <a href="{{ route('companies.index') }}" class="btn btn-light">Go to Companies</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="card text-white bg-success">
                                        <div class="card-header">Manage Employees</div>
                                        <div class="card-body">
                                            <h5 class="card-title">View and manage employees</h5>
                                            <a href="{{ route('employees.index') }}" class="btn btn-light">Go to Employees</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics (optional) -->
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="card bg-info text-white">
                                        <div class="card-header">Total Companies</div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $totalCompanies }}</h5>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <div class="card bg-warning text-white">
                                        <div class="card-header">Total Employees</div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $totalEmployees }}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
