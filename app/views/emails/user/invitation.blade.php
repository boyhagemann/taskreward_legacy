<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Invitation</h2>

		<div>
            
            {{ $password }}
            
            <a href="{{ URL::route('user.login') }}">Accept the invitation</a>
            
		</div>
	</body>
</html>
