<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Secure Messenger</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 text-gray-800">

<!-- Navbar -->

<nav class="bg-white shadow-sm sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6 py-4">

        <div class="flex justify-between items-center">

            <div>

                <h1 class="text-2xl font-bold text-blue-600">
                    🔒 Secure Messenger
                </h1>

            </div>

            <div class="hidden md:flex items-center gap-8">

                <a href="#features"
                   class="hover:text-blue-600 transition">
                    Features
                </a>

                <a href="#how-it-works"
                   class="hover:text-blue-600 transition">
                    How It Works
                </a>

                <a href="#about"
                   class="hover:text-blue-600 transition">
                    About
                </a>

                <a href="#contact"
                   class="hover:text-blue-600 transition">
                    Contact
                </a>

            </div>

            <div class="flex gap-3">

                <a href="{{ route('login') }}"
                   class="px-5 py-2 border border-blue-600 text-blue-600 rounded-xl hover:bg-blue-50">

                    Login

                </a>

                <a href="{{ route('register') }}"
                   class="px-5 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700">

                    Register

                </a>

            </div>

        </div>

    </div>

</nav>

<!-- Hero Section -->

<section class="py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid md:grid-cols-2 gap-12 items-center">

            <div>

                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-medium">

                    Secure Communication Platform

                </span>

                <h1 class="text-6xl font-bold mt-6 leading-tight">

                    Connect Securely
                    <span class="text-blue-600">
                        With Anyone
                    </span>

                </h1>

                <p class="text-xl text-gray-600 mt-6">

                    Secure Messenger allows users to connect using unique
                    6-digit codes, send requests, manage contacts and
                    communicate privately.

                </p>

                <div class="flex gap-4 mt-8">

                    <a href="{{ route('register') }}"
                       class="bg-blue-600 text-white px-8 py-4 rounded-2xl shadow-lg hover:bg-blue-700">

                        🚀 Get Started

                    </a>

                    <a href="{{ route('login') }}"
                       class="bg-white border px-8 py-4 rounded-2xl hover:bg-gray-100">

                        Login

                    </a>

                </div>

            </div>

            <div>

                <div class="bg-white rounded-3xl shadow-xl p-10">

                    <div class="space-y-6">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-full bg-blue-100 flex items-center justify-center text-2xl">
                                👤
                            </div>

                            <div>

                                <h3 class="font-semibold">
                                    Unique User Codes
                                </h3>

                                <p class="text-gray-500 text-sm">
                                    Every user gets a secure identity.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-full bg-green-100 flex items-center justify-center text-2xl">
                                📨
                            </div>

                            <div>

                                <h3 class="font-semibold">
                                    Request Based System
                                </h3>

                                <p class="text-gray-500 text-sm">
                                    Only approved users can connect.
                                </p>

                            </div>

                        </div>

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-full bg-purple-100 flex items-center justify-center text-2xl">
                                💬
                            </div>

                            <div>

                                <h3 class="font-semibold">
                                    Secure Messaging
                                </h3>

                                <p class="text-gray-500 text-sm">
                                    Communicate with trusted contacts.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Features -->

<section id="features" class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold">
                Powerful Features
            </h2>

            <p class="text-gray-600 mt-3">
                Everything needed for secure communication.
            </p>

        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-gray-50 p-8 rounded-3xl">

                <div class="text-5xl mb-4">
                    🔐
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Security First
                </h3>

                <p class="text-gray-600">
                    Designed with privacy and security in mind.
                </p>

            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">

                <div class="text-5xl mb-4">
                    👥
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Contact Management
                </h3>

                <p class="text-gray-600">
                    Manage requests and trusted connections easily.
                </p>

            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">

                <div class="text-5xl mb-4">
                    ⚡
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Fast Experience
                </h3>

                <p class="text-gray-600">
                    Simple workflow with quick navigation.
                </p>

            </div>

        </div>

    </div>

</section>

<!-- Workflow -->

<section id="how-it-works" class="py-20">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-14">

            <h2 class="text-4xl font-bold">
                How It Works
            </h2>

        </div>

        <div class="grid md:grid-cols-4 gap-6">

            <div class="bg-white p-8 rounded-3xl shadow text-center">
                <div class="text-5xl mb-4">1️⃣</div>
                Register
            </div>

            <div class="bg-white p-8 rounded-3xl shadow text-center">
                <div class="text-5xl mb-4">2️⃣</div>
                Share Code
            </div>

            <div class="bg-white p-8 rounded-3xl shadow text-center">
                <div class="text-5xl mb-4">3️⃣</div>
                Send Request
            </div>

            <div class="bg-white p-8 rounded-3xl shadow text-center">
                <div class="text-5xl mb-4">4️⃣</div>
                Start Chatting
            </div>

        </div>

    </div>

</section>

<!-- About -->

<section id="about" class="py-20 bg-white">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-4xl font-bold mb-6">
            About Secure Messenger
        </h2>

        <p class="text-lg text-gray-600 leading-relaxed">

            Secure Messenger is a modern communication platform built using
            Laravel and Tailwind CSS. It enables secure user discovery,
            request-based connections, contact management and private messaging.

        </p>

    </div>

</section>

<!-- Contact -->

<section id="contact" class="py-20">

    <div class="max-w-4xl mx-auto px-6 text-center">

        <h2 class="text-4xl font-bold mb-6">
            Contact Us
        </h2>

        <p class="text-gray-600">

            For support, feedback or improvements.

        </p>

        <div class="mt-6">

            <p class="font-semibold text-xl">
                Mohit Raval
            </p>

            <p class="text-gray-500">
                Founder & Developer
            </p>

        </div>

    </div>

</section>

<!-- Footer -->

<footer class="bg-white border-t">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="text-center">

            <h3 class="text-2xl font-bold text-blue-600">
                🔒 Secure Messenger
            </h3>

            <p class="text-gray-500 mt-2">
                Secure Communication Platform
            </p>

            <p class="mt-6 text-gray-600">
                Developed by Mohit Raval
            </p>

            <p class="text-gray-500 mt-2">
                © {{ date('Y') }} Secure Messenger. All Rights Reserved.
            </p>

            <p class="text-sm text-gray-400 mt-3">
                Version 1.0 • Laravel • Tailwind CSS
            </p>

        </div>

    </div>

</footer>

</body>
</html>