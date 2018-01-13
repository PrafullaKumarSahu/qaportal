<!DOCOMENT html>
<!DOCTYPE html>
<html>
<head>
	<title>My APP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://use.fontawesome.com/186d4abcb8.js"></script>
	<!-- Take this style to assets -->
	<style type="text/css">
		li.dropdown.nav-item {
		    padding-top: 2px;
		}
		.btn a, .btn a:hover, .btn a:focus, .btn a:visited{
			color: #FFFFFF;
			text-decoration: none;
		}
		.delete-icon{
			color: #d9534f;
		}
		.option-label {
		    display: inline-block;
		}
		.edit-icon{
			color: #0275d8;
		}
		.btn{
			margin: 5px;
		}
		.pagination li {
		    padding: 0 5px;
		    border: 1px solid #ddd;
		    margin: 5px;
		}
		.exams a{
			text-decoration: none;
			font-weight: 600;
		}
	</style>
</head>
<body>
	<div class="container">
		@auth
			@include('layouts.menu')
		@endauth
		@yield('content')
	</div>

	@yield('footer')
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>