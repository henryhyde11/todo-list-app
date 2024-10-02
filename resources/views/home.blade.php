<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-800">
    <nav class="border-b-2 border-slate-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">To Do</span>

            <div class="flex gap-5">
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="/login" class="text-md  text-white hover:underline">Iniciar sesión</a>
                </div>
                <div class="flex items-center space-x-6 rtl:space-x-reverse">
                    <a href="#" class="text-md  text-white hover:underline">Registrarse</a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>
