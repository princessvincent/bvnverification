<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>
<div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
</div>
<body>
    <h1 class="text-3xl font-bold underline">
        {{-- Hello world! --}}
    </h1>

    {{-- <div class="p-4 text-white bg-green-500 rounded-lg text-center">TailwindCss</div> --}}
    <form action="{{ route('registerfunction') }}" method="post">
        @csrf
        <div class="flex justify-center items-center h-screen bg-indigo-600">

            <div class="w-96 p-6 shadow-lg bg-white rounded-md">

                <h1 class="text-center font-semibold">
                    Register
                </h1>
                <hr class="mt-3">

                <div class="mt-3">
                    <label for="name" class="block text-base mb-2">Fullname</label>
                    <input type="text" name="name"
                        class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter your Fullname">
                </div>

                <div class="mt-3">
                    <label for="email" class="block text-base mb-2">Email</label>
                    <input type="email" name="email"
                        class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Email">
                </div>
                <div class="mt-3">
                    <label for="password" class="block text-base mb-2">Password</label>
                    <input type="password" name="password"
                        class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter Password">

                </div>
                <div class="flex justify-center items-center">
                    <button class="mt-5 border-2 border-indigo-700 bg-indigo-700 text-white py-1 px-5">Register</button>
                </div>





            </div>
        </div>

    </form>

</body>

</html>
