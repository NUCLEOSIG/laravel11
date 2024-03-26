<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Suscriptores') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <form class="max-w-sm mx-auto" action="{{ route('suscriptores.store') }}" method="POST">
                    @csrf
                    <div >
                        <div>
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Suscriptor</label>
                            <input type="text" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre de Suscriptor" required />
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required />
                        </div>
                        <div>
                            <label for="telefono" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefono</label>
                            <input type="number" name="telefono" id="telefono" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Telefono" required />
                        </div>
                        <div>
                            <label for="suscrito" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categorias</label>
                            <select id="suscritoselect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="Categoria(this)">
                                <option selected>Selecciona uno para agregar</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->nombre }}" data-nombre="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                                @endforeach
                            </select>
                            <input readonly type="text" name="suscrito" id="suscrito" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione las Categorias" required />
                        </div>
                        <div>
                            <label for="canales" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notificaciones</label>
                            <select id="canalesselect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="Notificaciones(this)">
                                <option selected>Selecciona uno para agregar</option>
                                @foreach ($notificaciones as $notificacion)
                                    <option value="{{ $notificacion->nombre }}" data-nombre="{{ $notificacion->nombre }}">{{ $notificacion->nombre }}</option>
                                @endforeach
                            </select>
                            <input readonly type="text" name="canales" id="canales" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Seleccione los tipos de Notificaciones" required />
                        </div>
                    </div> 
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                </form>
                    <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Id
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Email
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Telefono
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Categorias
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Notificaciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($suscriptores as $suscriptor)
                                <tr class="bg-blue-500 border-b border-blue-400">
                                    <th scope="row" class="px-6 py-4 font-medium text-blue-50 whitespace-nowrap dark:text-blue-100">
                                        {{ $suscriptor->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $suscriptor->nombre }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $suscriptor->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $suscriptor->telefono }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $suscriptor->suscrito }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $suscriptor->canales }}
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function Categoria(select){
        // Obtenemos el valor normal
        let valor = select.value;
        // Obtenemos la opción seleccionada
        let option = select.options[select.selectedIndex];
        if( option == undefined )
        {
            // Bueno yo corto la función xD ya decides que hacer
            return;
        }
        var sucrito = document.getElementById('suscrito').value;
        let add = option.dataset.nombre;
        sucrito = sucrito.concat(" ");
        sucrito = sucrito.concat(add);
        
        document.getElementById("suscrito").value= sucrito;

    }

</script>
<script>
    function Notificaciones(select){
        // Obtenemos el valor normal
        let valor = select.value;
        // Obtenemos la opción seleccionada
        let option = select.options[select.selectedIndex];
        if( option == undefined )
        {
            // Bueno yo corto la función xD ya decides que hacer
            return;
        }
        var canales = document.getElementById('canales').value;
        let add = option.dataset.nombre;
        canales = canales.concat(" ");
        canales = canales.concat(add);
        document.getElementById("canales").value= canales;

    }

</script>