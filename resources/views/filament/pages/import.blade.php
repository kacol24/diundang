<x-filament::page>
    <form
        wire:submit.prevent="import" class="space-y-6">
        <x-filament-support::grid class="grid grid-cols-1 lg:grid-cols-3 gap-6 filament-forms-component-container">
            <div class="col-span-1">
                <div class="filament-forms-field-wrapper">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                            <label
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label"
                                for="data.bad_words">
                                <span class="text-sm font-medium leading-4 text-gray-700 dark:text-gray-300">
                                    CSV File
                                </span>
                            </label>
                        </div>
                        <input type="file"
                               wire:model.defer="import">
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="filament-forms-field-wrapper">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                            <label
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label"
                                for="data.group">
                                <span class="text-sm font-medium leading-4 text-gray-700 dark:text-gray-300">
                                    Group
                                </span>
                            </label>
                        </div>
                        <select class="w-full" id="data.group"
                                wire:model.defer="groupId">
                            <option value="">
                                -- No Group --
                            </option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">
                                    {{ $group->group_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="filament-forms-field-wrapper">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between space-x-2 rtl:space-x-reverse">
                            <label
                                class="inline-flex items-center space-x-3 rtl:space-x-reverse filament-forms-field-wrapper-label"
                                for="data.seating">
                                <span class="text-sm font-medium leading-4 text-gray-700 dark:text-gray-300">
                                    Seating
                                </span>
                            </label>
                        </div>
                        <select id="data.seating" class="w-full"
                                wire:model.defer="seatingId">
                            <option value="">
                                -- No Table --
                            </option>
                            @foreach($seatings as $value => $seating)
                                <option value="{{ $value }}">
                                    {{ $seating }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </x-filament-support::grid>
        <div class="filament-page-actions flex flex-wrap items-center gap-4 justify-start filament-form-actions">
            <button type="submit"
                    class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset filament-button dark:focus:ring-offset-0 min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-primary-600 hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700 filament-page-button-action">
                Submit
            </button>
        </div>
    </form>
</x-filament::page>
