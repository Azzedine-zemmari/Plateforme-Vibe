<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('profile.auto-delete') }}">
                        @csrf
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="auto_delete_messages" value="1" 
                                    {{ auth()->user()->auto_delete_messages ? 'checked' : '' }}>
                                Activer la suppression automatique des messages
                            </label>
                        </div>
                        
                        <div class="form-group">
                            <label>Supprimer les messages après (jours) :</label>
                            <input type="number" name="delete_messages_after_days" 
                                value="{{ auth()->user()->delete_messages_after_days }}" 
                                min="1" max="365">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
