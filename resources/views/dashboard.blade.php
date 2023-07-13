
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    <h1 class="text-3xl font-bold underline">
        {{-- Hello world! --}}
    </h1>

    {{-- <div class="p-4 text-white bg-green-500 rounded-lg text-center">TailwindCss</div> --}}

    <div class="flex justify-center items-center h-screen bg-indigo-600">

        <div class="w-96 p-6 shadow-lg bg-white rounded-md">

            <h1 class="text-center font-semibold">
                WELCOME TO BVN VERIFICATION APP
            </h1>
            <p class="text-center">Verify your BVN below</p>

            <form action="{{ route('verifybvn') }}" method="POST">
                @csrf
                <div class="mt-3">
                    {{-- <input type="hidden" name="isSubjectConsent" value="true"> --}}
                    <label for="bvn" class="block text-base mb-2">Bvn</label>
                    <input type="text" name="id"
                        class="border w-full text-base px-2 py-1 focus:outline-none focus:ring-0 focus:border-gray-600"
                        placeholder="Enter your BVN" required>
                </div>
                <div class="flex justify-center items-center">
                    <button class="mt-5 border-2 border-indigo-700 bg-indigo-700 text-white py-1 px-5">Verify</button>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
