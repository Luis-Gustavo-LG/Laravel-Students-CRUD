<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudantes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class='width-100 height-25 bg-slate-950 text-white text-center py-3'>
        <h1 class='italic'>Gerenciador de Estudantes</h1>
    </header>
    <main class='bg-gray-300 min-h-screen flex flex-col items-center justify-center py-10'>

        <a href="{{ url('/create') }}" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer mb-4'>Adicionar Novo Estudante</a>

            @if($students->isEmpty())
                <p class='text-2xl text-center'>Nenhum estudante cadastrado.</p>
            @else
                <table class='width-100 border-collapse border border-gray-400'>
                    <thead>
                        <tr class='bg-gray-200'>
                            <th class='border border-gray-400 px-4 py-2'>ID</th>
                            <th class='border border-gray-400 px-4 py-2'>Nome</th>
                            <th class='border border-gray-400 px-4 py-2'>Email</th>
                            <th class='border border-gray-400 px-4 py-2'>Telefone</th>
                            <th class='border border-gray-400 px-4 py-2'>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td class='border border-gray-400 px-4 py-2'>{{ $student->id }}</td>
                                <td class='border border-gray-400 px-4 py-2'>{{ $student->name }}</td>
                                <td class='border border-gray-400 px-4 py-2'>{{ $student->email }}</td>
                                <td class='border border-gray-400 px-4 py-2'>{{ $student->phone }}</td>
                                <td class='border border-gray-400 px-4 py-2'>
                                    <a href="{{ route('students.edit', $student->id) }}" class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer'>Editar</a>
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded cursor-pointer'>Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
            
            <div class="mt-4">
                {{ $students->links() }}
            </div>
    </main>
</body>
</html>