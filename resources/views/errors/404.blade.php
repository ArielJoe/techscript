<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Page Not Found</title>
    <link rel="icon" href="{{ asset('tslogo.png') }}">
    @vite('resources/css/app.css')
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-teal-cyan mb-4">404</h1>
            <p class="text-2xl text-teal-cyan mb-2">Oops! Page Not Found</p>
            <p class="text-teal-cyan mb-6">
                Redirecting to your dashboard in
                <span id="timer" class="font-semibold text-teal-cyan transition-all duration-300">5</span>
                seconds...
            </p>
            <a href="{{ url('/') }}"
                class="inline-block bg-teal-cyan hover:bg-teal-cyan/90 text-white px-6 py-3 rounded-lg transition">
                Go to Dashboard
            </a>
        </div>
    </div>

    <script>
        let countdown = 5; // 5 seconds countdown
        function startCountdown() {
            const timerElement = document.getElementById('timer');
            const interval = setInterval(() => {
                countdown--;
                timerElement.textContent = countdown;

                // State change: Update color and animation based on countdown value
                if (countdown <= 3 && countdown > 1) {
                    // Change to teal-cyan when 3 or 2 seconds remain
                    timerElement.classList.remove('text-light-cyan');
                    timerElement.classList.add('text-teal-cyan', 'animate-pulse');
                } else if (countdown <= 1) {
                    // Change to deep-teal when 1 second remains
                    timerElement.classList.remove('text-teal-cyan');
                    timerElement.classList.add('text-deep-teal', 'animate-bounce');
                }

                // Redirect when countdown reaches 0
                if (countdown <= 0) {
                    clearInterval(interval);
                    window.location.href = '{{ url('/') }}'; // Redirect to homepage
                }
            }, 1000); // Update every second
        }

        // Start the countdown when the page loads
        window.onload = startCountdown;
    </script>
</body>

</html>
