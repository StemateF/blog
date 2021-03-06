<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
		<title>test</title>
		<script type="text/javascript">
		window.token="{{ csrf_token() }}"
		
		</script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>


	</head>

	<body>
		<div id="app">
			<loader v-bind:loading="loading" ></loader>
			<admin-control-menu></admin-control-menu>
			<b-navbar toggleable="md" type="light" variant="white" class="mb-4">
				<div class="container">
					<b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
					<b-navbar-brand >
						<img src="{{asset('img/logo.png')}}" alt="Logo">
					</b-navbar-brand>
					<b-collapse is-nav id="nav_collapse">
						<b-navbar-nav>
							<b-nav-item :to="{name:'home'}">Home</b-nav-item>
							{{-- <b-nav-item :to="{name:'categories'}">Categories</b-nav-item> --}}
							<b-nav-item :to="{name:'about'}">About Me</b-nav-item>
							
						</b-navbar-nav>
						<!-- Right aligned nav items -->
						<b-navbar-nav class="ml-auto">
							<user-header></user-header>
						</b-navbar-nav>
					</b-collapse>
				</div>
				</b-navbar>
				<b-container>
					<b-row>
						<b-col >
							<router-view></router-view>
						</b-col>
						<b-col sm="4" v-if="showSideBar">
							<div class="bg-white mb-4" style="height:200px">
								ad
							</div>
							<div class="bg-danger mb-4" style="height:200px">
								newslateer tab
							</div>
							<div class="bg-danger mb-4" style="height:200px">
								most popular news
							</div>
							<div class="bg-white " style="height:400px">
								one ad
							</div>
						</b-col>
					</b-row>
				</b-container>
		</div>
		<script src="{{ asset('js/app.js') }}"></script>
	</body>

</html>