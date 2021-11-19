<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex flex-col align-items-center">
                <div class="p-6 bg-white border-b border-gray-200">
                   Welcome {{ auth()->user()->name }}
                </div>

                @if (Session::get('activated') == False)
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">License non activée</strong>
                    <span class="block sm:inline">Veuillez activer votre license pour utiliser le produit</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                
                @else
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                      <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                      <div>
                        <p class="font-bold">License activ</p>
                        <p class="text-sm">Vous pouvez maintenant utiliser votre produit.</p>
                      </div>
                    </div>
                  </div>
                @endif


                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4">
                      <div class="font-bold text-xl mb-2">License Key</div>
                      <p class="text-gray-700 text-base">
                       Votre clé est la suivante: {{ Session::get('licenseKey')}}
                      </p>
                    </div>
                    @if (Session::get('activated') == False)
                    <div class="px-6 pt-4 pb-2">
                      <form method="POST" action="{{ route('activateKey') }}">
                        <input class="cursor-pointer bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"7
                         type="submit" value="Activer la clé" />
                      </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
