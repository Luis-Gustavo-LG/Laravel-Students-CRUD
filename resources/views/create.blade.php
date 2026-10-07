<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gerenciador de Estudantes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class='width-100 height-25 bg-slate-950 text-white text-center py-3'>
        <h1 class='italic'>Gerenciador de Estudantes</h1>
    </header>
    <main class='bg-gray-300 min-h-screen flex flex-col items-center justify-center py-10'>
        <h2 class='text-2xl font-bold mb-4'>Adicionar Novo Estudante</h2>
        <form class='flex flex-col gap-4 bg-slate-950 text-white p-6 rounded-xl' action="{{ route('students.store') }}" method="POST">
            @csrf
            @error('name')
                <p class='text-red-500'>{{ $message }}</p>
            @enderror
            <label>Nome:</label>
            <input type="text" name="name" id="name" class='border text-white border-gray-400 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500'>
            @error('email')
                <p class='text-red-500'>{{ $message }}</p>
            @enderror
            <label>Email:</label>
            <input type="email" name="email" id="email" class='border text-white border-gray-400 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500'>
            @error('phone')
                <p class='text-red-500'>{{ $message }}</p>
            @enderror
            <label>Telefone:</label>
            <input type="tel" name="phone" id="phone" class='border text-white border-gray-400 rounded py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-500'>
            <button type="submit" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer'>Adicionar</button>
        </form>

        <a href="{{ url('/') }}" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer mt-3'>Voltar para listagem</a>
    </main>
</body>
</html>