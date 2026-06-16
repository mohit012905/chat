
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Secure Messenger</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

</head>

<body class="bg-slate-50 text-slate-900 font-sans">

    <!-- Background -->

    <div class="fixed inset-0 -z-10 overflow-hidden">

        <div
            class="absolute -top-40 -left-40 w-[500px] h-[500px] bg-blue-200 rounded-full blur-3xl opacity-30">
        </div>

        <div
            class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-200 rounded-full blur-3xl opacity-30">
        </div>

    </div>
<!-- ========================= -->
<!-- NAVBAR -->
<!-- ========================= -->

<nav class="fixed top-0 left-0 w-full bg-white/80 backdrop-blur-xl border-b border-slate-200 z-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="h-20 flex items-center justify-between">

            <!-- Logo -->

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-2xl bg-[#5865F2] flex items-center justify-center text-white font-bold shadow-lg">

                    🔒

                </div>

                <div>

                    <h1 class="text-xl font-bold text-slate-900">

                        Secure Messenger

                    </h1>

                    <p class="text-xs text-slate-500">

                        Private Communication Platform

                    </p>

                </div>

            </div>

            <!-- Menu -->

            <div class="hidden md:flex items-center gap-8">

                <a href="#features"
                    class="text-slate-600 hover:text-[#5865F2] transition">

                    Features

                </a>

                <a href="#security"
                    class="text-slate-600 hover:text-[#5865F2] transition">

                    Security

                </a>

                <a href="#workflow"
                    class="text-slate-600 hover:text-[#5865F2] transition">

                    Workflow

                </a>

                <a href="#contact"
                    class="text-slate-600 hover:text-[#5865F2] transition">

                    Contact

                </a>

            </div>

            <!-- Buttons -->

            <div class="flex items-center gap-3">

                <a href="{{ route('login') }}"
                    class="px-5 py-2.5 rounded-xl border border-slate-300 hover:bg-slate-100 transition">

                    Login

                </a>

                <a href="{{ route('register') }}"
                    class="px-5 py-2.5 rounded-xl bg-[#5865F2] text-white hover:bg-[#4752C4] transition shadow-lg">

                    Register

                </a>

            </div>

        </div>

    </div>

</nav>

<!-- ========================= -->
<!-- HERO SECTION -->
<!-- ========================= -->

<section class="relative overflow-hidden pt-40 pb-32">

    <!-- Background -->

    <div class="absolute inset-0 -z-10">

        <div
            class="absolute top-0 left-0 w-[600px] h-[600px] bg-indigo-100 rounded-full blur-3xl opacity-70">
        </div>

        <div
            class="absolute right-0 bottom-0 w-[600px] h-[600px] bg-blue-100 rounded-full blur-3xl opacity-70">
        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->

            <div>

                <span
                    class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 text-sm font-medium">

                    ✨ Modern Secure Messaging

                </span>

                <h1
                    class="mt-8 text-5xl md:text-6xl lg:text-7xl font-black leading-tight tracking-tight text-slate-900">

                    A Better Way To

                    <span class="block text-[#5865F2]">

                        Connect Securely

                    </span>

                </h1>

                <p
                    class="mt-8 text-xl text-slate-600 max-w-2xl leading-relaxed">

                    Connect through unique identity codes,
                    approve trusted contacts,
                    and communicate privately through a modern,
                    secure messaging experience.

                </p>

                <div class="flex flex-wrap gap-4 mt-10">

                    <a href="{{ route('register') }}"
                        class="px-8 py-4 rounded-2xl bg-[#5865F2] text-white font-semibold shadow-xl hover:bg-[#4752C4] hover:-translate-y-1 transition-all duration-300">

                        🚀 Get Started

                    </a>

                    <a href="{{ route('login') }}"
                        class="px-8 py-4 rounded-2xl border border-slate-300 bg-white hover:bg-slate-50 transition">

                        Login

                    </a>

                </div>

                <!-- Stats -->

                <div class="grid grid-cols-3 gap-8 mt-16 max-w-lg">

                    <div>

                        <h3 class="text-4xl font-black text-[#5865F2]">

                            100%

                        </h3>

                        <p class="text-slate-500 mt-1">

                            Private

                        </p>

                    </div>

                    <div>

                        <h3 class="text-4xl font-black text-[#5865F2]">

                            24/7

                        </h3>

                        <p class="text-slate-500 mt-1">

                            Online

                        </p>

                    </div>

                    <div>

                        <h3 class="text-4xl font-black text-[#5865F2]">

                            Secure

                        </h3>

                        <p class="text-slate-500 mt-1">

                            Trusted

                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->

            <div>

                <div
                    class="bg-white rounded-[32px] shadow-2xl border border-slate-200 overflow-hidden">

                    <!-- Header -->

                    <div
                        class="bg-[#5865F2] px-6 py-5 text-white">

                        <h3 class="font-semibold text-lg">

                            Secure Messenger Dashboard

                        </h3>

                        <p class="text-indigo-100 text-sm">

                            Trusted Connections Only

                        </p>

                    </div>

                    <!-- Content -->

                    <div class="p-6">

                        <div class="grid grid-cols-3 gap-4">

                            <div
                                class="bg-slate-50 rounded-2xl p-4">

                                <p class="text-xs text-slate-500">

                                    Contacts

                                </p>

                                <h3 class="text-3xl font-bold mt-2">

                                    24

                                </h3>

                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-4">

                                <p class="text-xs text-slate-500">

                                    Requests

                                </p>

                                <h3 class="text-3xl font-bold mt-2">

                                    5

                                </h3>

                            </div>

                            <div
                                class="bg-slate-50 rounded-2xl p-4">

                                <p class="text-xs text-slate-500">

                                    Messages

                                </p>

                                <h3 class="text-3xl font-bold mt-2">

                                    128

                                </h3>

                            </div>

                        </div>

                        <div class="mt-6 space-y-3">

                            <div
                                class="bg-slate-50 rounded-xl p-4 flex justify-between">

                                <span>John Doe</span>

                                <span class="text-green-500">● Online</span>

                            </div>

                            <div
                                class="bg-slate-50 rounded-xl p-4 flex justify-between">

                                <span>Sarah Wilson</span>

                                <span class="text-green-500">● Online</span>

                            </div>

                            <div
                                class="bg-slate-50 rounded-xl p-4 flex justify-between">

                                <span>Michael Brown</span>

                                <span class="text-slate-400">Offline</span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>
<!-- ===================================== -->
<!-- FEATURES -->
<!-- ===================================== -->

<section id="features" class="py-32 bg-slate-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-20">

            <span
                class="inline-flex px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-medium">

                Features

            </span>

            <h2 class="mt-6 text-5xl font-black text-slate-900">

                Everything You Need

            </h2>

            <p class="mt-4 text-xl text-slate-500 max-w-2xl mx-auto">

                Secure communication, trusted connections,
                and a modern user experience.

            </p>

        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Card -->

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-2xl">

                    🔒

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Secure Messaging

                </h3>

                <p class="mt-3 text-slate-500">

                    Private communication with trusted users.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-green-100 flex items-center justify-center text-2xl">

                    👥

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Trusted Contacts

                </h3>

                <p class="mt-3 text-slate-500">

                    Build your own secure network.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-2xl">

                    📨

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Request Approval

                </h3>

                <p class="mt-3 text-slate-500">

                    Communication starts only after approval.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-pink-100 flex items-center justify-center text-2xl">

                    ⚡

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Fast Experience

                </h3>

                <p class="mt-3 text-slate-500">

                    Optimized for speed and responsiveness.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl">

                    🔔

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Real-Time Updates

                </h3>

                <p class="mt-3 text-slate-500">

                    Instant request and message notifications.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300">

                <div
                    class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">

                    🛡️

                </div>

                <h3 class="mt-6 text-xl font-bold">

                    Privacy First

                </h3>

                <p class="mt-3 text-slate-500">

                    Designed around user privacy and control.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- ===================================== -->
<!-- SECURITY SECTION -->
<!-- ===================================== -->

<section id="security" class="py-32 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- Left -->

            <div>

                <span
                    class="inline-flex px-4 py-2 rounded-full bg-green-100 text-green-700 font-medium">

                    Security

                </span>

                <h2
                    class="mt-6 text-5xl font-black leading-tight text-slate-900">

                    Built Around

                    <span class="text-[#5865F2]">

                        Privacy & Trust

                    </span>

                </h2>

                <p
                    class="mt-8 text-xl text-slate-600 leading-relaxed">

                    Every user gets a unique identity code.
                    Requests must be approved before communication begins,
                    creating a safer messaging experience.

                </p>

                <div class="mt-10 space-y-6">

                    <div class="flex gap-4">

                        <div
                            class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center">

                            ✓

                        </div>

                        <div>

                            <h4 class="font-semibold text-lg">

                                Unique Identity Codes

                            </h4>

                            <p class="text-slate-500">

                                Every account receives a secure identifier.

                            </p>

                        </div>

                    </div>

                    <div class="flex gap-4">

                        <div
                            class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center">

                            ✓

                        </div>

                        <div>

                            <h4 class="font-semibold text-lg">

                                Approved Connections

                            </h4>

                            <p class="text-slate-500">

                                Chat only with users you trust.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div>

                <div
                    class="bg-slate-50 border border-slate-200 rounded-[32px] p-8 shadow-lg">

                    <h3 class="font-bold text-xl mb-8">

                        Security Dashboard

                    </h3>

                    <div class="space-y-5">

                        <div
                            class="bg-white rounded-2xl p-5 flex justify-between items-center">

                            <span>Identity Verification</span>

                            <span class="text-green-600 font-semibold">

                                Active

                            </span>

                        </div>

                        <div
                            class="bg-white rounded-2xl p-5 flex justify-between items-center">

                            <span>Contact Approval</span>

                            <span class="text-green-600 font-semibold">

                                Enabled

                            </span>

                        </div>

                        <div
                            class="bg-white rounded-2xl p-5 flex justify-between items-center">

                            <span>Private Messaging</span>

                            <span class="text-green-600 font-semibold">

                                Protected

                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===================================== -->
<!-- WORKFLOW -->
<!-- ===================================== -->

<section id="workflow" class="py-32 bg-slate-50">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-20">

            <span
                class="inline-flex px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-medium">

                Workflow

            </span>

            <h2 class="mt-6 text-5xl font-black">

                How It Works

            </h2>

        </div>

        <div class="grid md:grid-cols-4 gap-8">

            <div
                class="bg-white rounded-3xl p-8 text-center shadow-sm hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    1️⃣

                </div>

                <h3 class="font-bold text-lg">

                    Register

                </h3>

                <p class="mt-2 text-slate-500">

                    Create your account.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 text-center shadow-sm hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    2️⃣

                </div>

                <h3 class="font-bold text-lg">

                    Get Your Code

                </h3>

                <p class="mt-2 text-slate-500">

                    Receive a unique identity.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 text-center shadow-sm hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    3️⃣

                </div>

                <h3 class="font-bold text-lg">

                    Send Request

                </h3>

                <p class="mt-2 text-slate-500">

                    Connect securely.

                </p>

            </div>

            <div
                class="bg-white rounded-3xl p-8 text-center shadow-sm hover:shadow-xl transition">

                <div class="text-5xl mb-5">

                    4️⃣

                </div>

                <h3 class="font-bold text-lg">

                    Start Chatting

                </h3>

                <p class="mt-2 text-slate-500">

                    Communicate privately.

                </p>

            </div>

        </div>

    </div>

</section>
<!-- ===================================== -->
<!-- ABOUT SECTION -->
<!-- ===================================== -->

<section id="about" class="py-32 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- Left -->

            <div>

                <span
                    class="inline-flex px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-medium">

                    About Secure Messenger

                </span>

                <h2
                    class="mt-6 text-5xl font-black leading-tight text-slate-900">

                    Modern Communication

                    <span class="text-[#5865F2]">

                        Built For Trust

                    </span>

                </h2>

                <p
                    class="mt-8 text-xl text-slate-600 leading-relaxed">

                    Secure Messenger is a privacy-focused platform that helps
                    users connect through unique identity codes, manage trusted
                    contacts, and communicate securely.

                </p>

                <div class="grid grid-cols-2 gap-6 mt-10">

                    <div
                        class="bg-slate-50 rounded-3xl p-6 border border-slate-200">

                        <h3 class="text-4xl font-black text-[#5865F2]">

                            100%

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Secure Connections

                        </p>

                    </div>

                    <div
                        class="bg-slate-50 rounded-3xl p-6 border border-slate-200">

                        <h3 class="text-4xl font-black text-[#5865F2]">

                            Fast

                        </h3>

                        <p class="mt-2 text-slate-500">

                            Real-Time Experience

                        </p>

                    </div>

                </div>

            </div>

            <!-- Right -->

            <div>

                <div
                    class="bg-gradient-to-br from-[#5865F2] to-[#4752C4] rounded-[32px] p-10 text-white shadow-2xl">

                    <h3 class="text-3xl font-bold">

                        Why Choose Secure Messenger?

                    </h3>

                    <div class="space-y-5 mt-8">

                        <div class="flex items-center gap-4">

                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Secure Identity Codes</span>

                        </div>

                        <div class="flex items-center gap-4">

                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Request-Based Connections</span>

                        </div>

                        <div class="flex items-center gap-4">

                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Trusted Contact Network</span>

                        </div>

                        <div class="flex items-center gap-4">

                            <div
                                class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">

                                ✓

                            </div>

                            <span>Modern Laravel Architecture</span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- ===================================== -->
<!-- CTA SECTION -->
<!-- ===================================== -->

<section class="py-32 bg-slate-50">

    <div class="max-w-6xl mx-auto px-6">

        <div
            class="bg-[#5865F2] rounded-[40px] p-16 md:p-20 text-center text-white shadow-2xl">

            <h2 class="text-5xl md:text-6xl font-black">

                Ready To Start Messaging?

            </h2>

            <p class="mt-6 text-xl text-indigo-100 max-w-2xl mx-auto">

                Join Secure Messenger today and experience
                trusted private communication.

            </p>

            <div class="flex flex-wrap justify-center gap-4 mt-10">

                <a href="{{ route('register') }}"
                    class="px-8 py-4 bg-white text-[#5865F2] rounded-2xl font-semibold hover:scale-105 transition">

                    Create Account

                </a>

                <a href="{{ route('login') }}"
                    class="px-8 py-4 border border-white/30 rounded-2xl hover:bg-white/10 transition">

                    Login

                </a>

            </div>

        </div>

    </div>

</section>

<!-- ===================================== -->
<!-- CONTACT -->
<!-- ===================================== -->

<section id="contact" class="py-32 bg-white">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <span
            class="inline-flex px-4 py-2 rounded-full bg-indigo-100 text-indigo-700 font-medium">

            Contact

        </span>

        <h2 class="mt-6 text-5xl font-black">

            Let's Build Something Great

        </h2>

        <p class="mt-6 text-xl text-slate-500">

            Have suggestions, ideas or feedback?
            We'd love to hear from you.

        </p>

        <div
            class="mt-12 bg-slate-50 border border-slate-200 rounded-[32px] p-10">

            <div
                class="w-24 h-24 rounded-full bg-indigo-100 flex items-center justify-center text-4xl mx-auto">

                👨‍💻

            </div>

            <h3 class="mt-6 text-3xl font-bold">

                Mohit Raval

            </h3>

            <p class="text-slate-500 mt-2">

                Founder & Developer

            </p>

            <p class="mt-6 text-slate-600 max-w-xl mx-auto">

                Building modern communication experiences
                using Laravel, Tailwind CSS and secure design principles.

            </p>

        </div>

    </div>

</section>

<!-- ===================================== -->
<!-- FOOTER -->
<!-- ===================================== -->

<footer class="bg-slate-950 text-white">

    <div class="max-w-7xl mx-auto px-6 py-20">

        <div class="grid md:grid-cols-4 gap-12">

            <div>

                <h3 class="text-2xl font-bold text-[#5865F2]">

                    🔒 Secure Messenger

                </h3>

                <p class="mt-4 text-slate-400">

                    Modern private communication platform
                    built for trusted users.

                </p>

            </div>

            <div>

                <h4 class="font-semibold mb-4">

                    Product

                </h4>

                <ul class="space-y-3 text-slate-400">

                    <li>Features</li>
                    <li>Security</li>
                    <li>Messaging</li>

                </ul>

            </div>

            <div>

                <h4 class="font-semibold mb-4">

                    Resources

                </h4>

                <ul class="space-y-3 text-slate-400">

                    <li>Documentation</li>
                    <li>Support</li>
                    <li>Updates</li>

                </ul>

            </div>

            <div>

                <h4 class="font-semibold mb-4">

                    Company

                </h4>

                <ul class="space-y-3 text-slate-400">

                    <li>About</li>
                    <li>Contact</li>
                    <li>Privacy</li>

                </ul>

            </div>

        </div>

        <div
            class="mt-16 pt-8 border-t border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4">

            <p class="text-slate-500">

                © {{ date('Y') }} Secure Messenger.
                All Rights Reserved.

            </p>

            <p class="text-slate-500">

                Developed by Mohit Raval ❤️

            </p>

        </div>

    </div>

</footer>

</body>
</html>