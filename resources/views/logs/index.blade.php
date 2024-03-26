
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
                        <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
                            
                        </thead>
                        <tbody style="text-decoration-color: white">
                                <?php
                                    $lineas = file("C:/Users/NuCLeO/Laravel11/storage/logs/message.log", FILE_IGNORE_NEW_LINES);
                                    $numElementos = count($lineas) - 1;
                            
                                    for ($i = $numElementos; $i >= 0; $i--) {
                                        echo nl2br('<p class="text-xs text-white">'. $lineas[$i] . ' </p>'  );
                                        
                                    }
                                ?>;
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>