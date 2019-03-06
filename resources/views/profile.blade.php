@extends('layouts.app')

@section('content')
<div class="section-header">
  <h1>Profile</h1>
  <!-- Breadcrumb -->
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item">Profile</div>
  </div>
</div>
<div class="section-body">
  <h2 class="section-title">Hi, {{ $user->name }}</h2>
  <p class="section-lead">
    Change information about yourself on this page.
  </p>
  <!-- Your content goes here -->
  <div class="row mt-sm-4">
  	<div class="col-12 col-md-12 col-lg-12">
  		<div class="card">
  			<form class="need-validation" method="POST" action="{{ route('profile.update', ['user' => $user]) }}">
  				@method('PUT')
  				@csrf
  				<div class="card-header">
  					<h4>Edit Profile</h4>
  				</div>
  				<div class="card-body">
	  				@if ($errors->any())
	  					<div class="row">
	  						<div class="col-12">
	  							<div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
	  						</div>
	  					</div>
					@endif
					@if(session()->has('info'))
						<div class="row">
							<div class="col-12">
								<div class="alert alert-info">
									{{ session()->get('info') }}
								</div>
							</div>
						</div>
					@endif
  					<input type="hidden" name="id" value="{{ $user->id }}">
  					<div class="row">
  						<div class="form-group col-md-6 col-12">
  							<label>Name</label>
  							<input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
  							<div class="invalid-feedback">
  								Please fill in the first name
  							</div>
  						</div>
  						<div class="form-group col-md-6 col-12">
  							<label>Email</label>
  							<input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
  							<div class="invalid-feedback">
  								Please fill in the email in correct format
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="form-group col-md-6 col-12">
  							<label>Current Password</label>
  							<input type="password" name="current_password" class="form-control">
  							<div class="invalid-feedback">
  								Please fill in the password in correct format
  							</div>
  						</div>
  					</div>
  					<div class="row">
  						<div class="form-group col-md-6 col-12">
  							<label>New Password</label>
  							<input type="password" name="password" class="form-control">
  							<div class="invalid-feedback">
  								Please fill in the password in correct format
  							</div>
  						</div>
  						<div class="form-group col-md-6 col-12">
  							<label>Confirm New Password</label>
  							<input type="password" name="confirm_password" class="form-control">
  							<div class="invalid-feedback">
  								Please fill in the password in correct format
  							</div>
  						</div>
  					</div>
  				</div>
  				<div class="card-footer text-right">
  					<button type="submit" class="btn btn-primary">Save Changes</button>
  				</div>
  			</form>
  		</div>
  	</div>
  </div>
</div>
@endsection
