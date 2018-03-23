<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,500,700,400italic|Material+Icons">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
	<title>test</title>
	<script type="text/javascript">
		window.token="{{ csrf_token() }}"
	</script>
</head>

<body>
<div id="app">
	<md-app  md-mode="reveal" md-waterfall >
			<md-app-toolbar class="md-primary">
				<span class="md-title">My Title</span>
				<div class="md-toolbar-row md-toolbar-end">
					<md-tabs md-sync-route class="md-primary" md-alignment="right" >
						<md-tab id="tab-home" md-label="Home" to="/"></md-tab>
						<md-tab id="tab-pages" md-label="Blog" to="/foo"></md-tab>
						<md-tab id="tab-posts" md-label="About" to="/bar"></md-tab>
						<md-tab id="tab-settings" md-label="Contact" to="/components/tabs/settings"></md-tab>
					</md-tabs>
				</div>
			</md-app-toolbar>
			<md-app-content>
					<div class="container">
							<div class="row">
								<div class="col-md-8">
									<router-view/>
								</div>
								<div class="col-md-4" style="background-color:azure">
							
									</div>
							</div>
						</div>
			</md-app-content>
			
			
		</md-app>
	
</div>
 
<script src="{{ asset('js/app.js') }}"></script>
</body>

</html>