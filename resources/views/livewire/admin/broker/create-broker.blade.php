<?php

use App\Enums\BrokerType;
use App\Models\Broker;
use Flux\Flux;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

new class extends Component {
    use WithFileUploads;

    public string $name = '';
    public TemporaryUploadedFile|string|null $logo = null;
    public string $description = '';
    public array $types = [];
    public bool $isFileUpload = false;
    public bool $isAutoSync = false;

    public function createBroker(): void
    {
        $validated = $this->validate();
        $logoPath = null;

        if ($this->logo instanceof TemporaryUploadedFile) {
            $storedPath = $this->logo->store('brokers', 'public');
            $logoPath = 'storage/' . $storedPath;
        }

        $broker = new Broker();
        $broker->name = $validated['name'];
        $broker->logo = $logoPath;
        $broker->description = $validated['description'] ?: null;
        $broker->is_file_upload = $validated['isFileUpload'];
        $broker->is_auto_sync = $validated['isAutoSync'];
        $broker->save();

        $broker
            ->brokerTypes()
            ->createMany(array_map(static fn (string $type): array => ['type' => $type], $validated['types']));

        Flux::modal('create-broker')->close();
        Flux::toast(text: 'Broker created successfully.', heading: 'Broker Created', variant: 'success');

        $this->resetForm();
        $this->dispatch('refresh-brokers');
        $this->dispatch('refresh-broker');
    }

    public function closeModal(): void
    {
        Flux::modal('create-broker')->close();

        $this->resetForm();
        $this->dispatch('broker-created');
    }

    public function removeLogo(): void
    {
        $this->logo = null;
        $this->resetValidation('logo');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'unique:brokers,name'],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:2048'],
            'description' => ['nullable', 'string', 'max:1000'],
            'types' => ['required', 'array', 'min:1'],
            'types.*' => [
                'required',
                'string',
                Rule::in(
                    array_map(static fn (BrokerType $brokerType): string => $brokerType->value, BrokerType::cases()),
                ),
            ],
            'isFileUpload' => ['required', 'boolean'],
            'isAutoSync' => ['required', 'boolean'],
        ];
    }

    private function resetForm(): void
    {
        $this->reset(['name', 'logo', 'types', 'description', 'isFileUpload', 'isAutoSync']);
        $this->resetValidation();
    }
}; ?>

<div>
    <flux:modal name="create-broker" class="md:w-180" :dismissible="false" :closable="false">
        <div>
            <flux:heading class="data-flux-heading:text-lg">{{ __('Create Broker') }}</flux:heading>
            <flux:subheading>{{ __('Add a broker and assign supported types.') }}</flux:subheading>
        </div>

        <form wire:submit="createBroker" class="mt-6 flex flex-col gap-5">
            <flux:input
                wire:model="name"
                :label="__('Broker Name')"
                type="text"
                :placeholder="__('Enter broker name')"
                autofocus
            />

            <flux:file-upload wire:model="logo" :label="__('Broker Logo')">
                <flux:file-upload.dropzone
                    heading="Drop logo here"
                    text="or click to upload (JPG, PNG, SVG, WEBP up to 2MB)"
                />
            </flux:file-upload>

            @if ($logo instanceof TemporaryUploadedFile)
                <div class="mt-1 flex flex-col gap-2">
                    <flux:file-item
                        :heading="$logo->getClientOriginalName()"
                        :image="$logo->temporaryUrl()"
                        :size="$logo->getSize()"
                    >
                        <x-slot name="actions">
                            <flux:file-item.remove wire:click="removeLogo" />
                        </x-slot>
                    </flux:file-item>
                </div>
            @endif

            <flux:pillbox
                wire:model="types"
                multiple
                searchable
                clearable
                :label="__('Broker Types')"
                :placeholder="__('Select broker types')"
                search:placeholder="Search broker types..."
            >
                @foreach (BrokerType::cases() as $brokerType)
                    <flux:pillbox.option :value="$brokerType->value">
                        <div class="flex items-center gap-2">
                            <flux:icon
                                name="{{ $brokerType->getIcon() }}"
                                color="{{ $brokerType->getColor() }}"
                                variant="mini"
                            />
                            {{ $brokerType->getLabel() }}
                        </div>
                    </flux:pillbox.option>
                @endforeach
            </flux:pillbox>

            <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                <flux:switch wire:model="isFileUpload" :label="__('File Upload Enabled')" align="left" />
                <flux:switch wire:model="isAutoSync" :label="__('Auto Sync Enabled')" align="left" />
            </div>

            <flux:textarea
                wire:model="description"
                :label="__('Description')"
                :placeholder="__('Optional short description')"
                rows="3"
            />

            <div class="mt-4 flex gap-2">
                <flux:spacer />
                <flux:button variant="filled" color="zinc" type="button" wire:click="closeModal">Close</flux:button>
                <flux:button type="submit" variant="primary">Create Broker</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
