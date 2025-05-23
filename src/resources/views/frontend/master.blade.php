<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

        @stack('before-style')
		<link href="{{ asset('assets/css/output.css') }}" rel="stylesheet" />
		<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>

        @stack('after-style')
	</head>

    @yield('content')


    @stack('before-script')


    @stack('after-script')

</html>
