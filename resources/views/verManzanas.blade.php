<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>insertar manzanas</h1>
                    <h1>-------------------------------------------------------------------
                        -----------------------------------------------------------------------
                    </h1>
                    <form method="post" action="{{ route('InsertarManzanas') }}">
                        @csrf
                        <label for="tipoManzana">tipoManzana:</label>
                        <input type="text" name="tipoManzana" required>
                        <label for="precioKilo">precioKilo:</label>
                        <input type="number" name="precioKilo" required>
                        <!-- Agrega más campos según tu base de datos -->
                        <button type="submit">Enviar</button>
                    </form>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <h1>-------------------------------------------------------------------
                        -----------------------------------------------------------------------
                    </h1>
                    @if($manzanas)
                    <h2>Manzanas disponibles:</h2>
                    <ul>
                        @foreach($manzanas as $manzana)
                        <li>//////////////////////////////////////////////////////</li>
                        <li>id = {{ $manzana->id }}</li>
                        <li>tipoManzana = {{ $manzana->tipoManzana }}</li>
                        <li>precioKilo = {{ $manzana->precioKilo }}</li>
                        <li>---------------------</li>
                        <form action="{{ route('EliminarManzana', ['manzana' => $manzana->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="tipoManzana" value="{{ $manzana->tipoManzana }}">
                            <button type="submit" class="btn btn-danger">Eliminar
                                Manzana</button>
                        </form>
                        <li>---------------------</li>
                        <form action="{{ route('ModificarManzana') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $manzana->id }}">
                            <label for="tipoManzana">tipoManzana:</label>
                            <input type="text" name="tipoManzana" value="{{ $manzana->tipoManzana }}" required>
                            <label for="precioKilo">precioKilo:</label>
                            <input type="number" name="precioKilo" value="{{ $manzana->precioKilo }}" required>
                            <button type="submit" class="btn btn-warning">Modificar
                                Manzana</button>
                        </form>
                        @if(session('successModificar'))
                        <div class="alert alert-success">
                            {{ session('successModificar') }}
                            @endif
                            @if(session('errorModificar'))
                            <div class="alert alert-success">
                                {{ session('errorModificar') }}
                            </div>
                            @endif
                            @endforeach
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>