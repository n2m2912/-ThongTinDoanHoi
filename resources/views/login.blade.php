<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
@include('layouts.admin-head')
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
	<div class="app-content content container-fluid">
		<div class="content-wrapper">
			<div class="content-header row">
			</div>
			<div class="content-body">
				<section class="flexbox-container">
					<div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
						<div class="card border-grey border-lighten-3 m-0">
							<div class="card-header no-border">
								<div class="card-title text-xs-center">
									<div class="p-1"><img src="{{ asset('img/HUTECH.png')}}" alt="branding logo"></div>
								</div>
								<h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with Robust</span></h6>
							</div>
							<div class="card-body collapse in">
								<div class="card-block">
									<form class="form-horizontal form-simple" action="{{url('login')}}" method="POST" role="form">
										@if($errors->has('errorlogin'))
											<div class="alert alert-danger">
												<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
												{{$errors->first('errorlogin')}}
											</div>
										@endif
										<div class="form-group">
											<label for="">Tài khoản</label>
											<input type="text" class="form-control" id="username" placeholder="username" name="username" value="{{old('username')}}">
											@if($errors->has('username'))
												<p style="color:red">{{$errors->first('username')}}</p>
											@endif
										</div>
										<div class="form-group">
											<label for="">Mật khẩu</label>
											<input type="password" class="form-control" id="password" placeholder="Password" name="password">
											@if($errors->has('password'))
												<p style="color:red">{{$errors->first('password')}}</p>
											@endif
										</div>
										{!! csrf_field() !!}
										<button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
									</form>
								</div>
							</div>
							<div class="card-footer">
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
	@include('layouts.admin-footer')
</body>
</html>