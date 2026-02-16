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

    public Broker $broker;

    public array $types = [];
    public TemporaryUploadedFile|null $logo = null;
    public ?string $existingLogoPath = null;

    public function mount(Broker $broker): void
    {
        $this->broker = $broker;

        $this->types = $this->broker->brokerTypes
            ->pluck('type')
            ->map(static fn ($type): string => $type->value)
            ->values()
            ->all();

        $this->existingLogoPath = $this->broker->logo;
    }

    public function updateBroker(): void
    {
        $validated = $this->validate();

        $this->syncBrokerTypes($validated['types']);

        $logoPath = $this->existingLogoPath;

        if ($this->logo instanceof TemporaryUploadedFile) {
            $storedPath = $this->logo->store('brokers', 'public');
            $logoPath = 'storage/' . $storedPath;
        }

        $this->broker->logo = $logoPath;
        $this->broker->description = $this->broker->description ?: null;
        $this->broker->save();

        Flux::modal($this->modalName())->close();
        Flux::toast(text: 'Broker updated successfully.', heading: 'Broker Updated', variant: 'success');

        $this->resetForm();
        $this->dispatch('broker-updated');
    }

    public function removeLogo(): void
    {
        $this->logo = null;
        $this->existingLogoPath = null;
        $this->resetValidation('logo');
    }

    public function closeModal(): void
    {
        Flux::modal($this->modalName())->close();
        $this->resetForm();
    }

    protected function syncBrokerTypes(array $types): void
    {
        $this->broker
            ->brokerTypes()
            ->whereNotIn('type', $types)
            ->delete();

        foreach ($types as $type) {
            $this->broker->brokerTypes()->updateOrCreate(['type' => $type], []);
        }

        $this->broker->touch();
    }

    protected function rules(): array
    {
        return [
            'broker.name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('brokers', 'name')->ignore($this->broker->id),
            ],
            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,svg,webp', 'max:2048'],
            'broker.description' => ['nullable', 'string', 'max:1000'],
            'types' => ['required', 'array', 'min:1'],
            'types.*' => [
                'required',
                'string',
                Rule::in(
                    array_map(static fn (BrokerType $brokerType): string => $brokerType->value, BrokerType::cases()),
                ),
            ],
            'broker.is_file_upload' => ['required', 'boolean'],
            'broker.is_auto_sync' => ['required', 'boolean'],
        ];
    }

    private function resetForm(): void
    {
        $this->broker->refresh();
        $this->reset('types', 'logo', 'existingLogoPath');
        $this->resetValidation();
    }

    private function modalName(): string
    {
        return 'edit-broker-' . $this->broker->id;
    }

    private function logoPreviewUrl(): ?string
    {
        if ($this->logo instanceof TemporaryUploadedFile) {
            return $this->logo->temporaryUrl();
        }

        if ($this->existingLogoPath === null) {
            return null;
        }

        return str_starts_with($this->existingLogoPath, 'http')
            ? $this->existingLogoPath
            : asset($this->existingLogoPath);
    }

    private function logoPreviewName(): ?string
    {
        if ($this->logo instanceof TemporaryUploadedFile) {
            return $this->logo->getClientOriginalName();
        }

        if ($this->existingLogoPath === null) {
            return null;
        }

        return basename($this->existingLogoPath);
    }

    private function logoPreviewSize(): ?int
    {
        if ($this->logo instanceof TemporaryUploadedFile) {
            return (int) $this->logo->getSize();
        }

        return null;
    }
}; ?>

<div>
    <flux:modal :name="$this->modalName()" class="md:w-180" :dismissible="false">
        <div>
            <flux:heading size="lg">{{ __('Edit Broker') }}</flux:heading>
            <flux:subheading>{{ __('Update broker details and supported types.') }}</flux:subheading>
        </div>

        <form wire:submit="updateBroker" class="mt-6 flex flex-col gap-5">
            <flux:input
                wire:model="broker.name"
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

            @if ($this->logoPreviewUrl())
                <div class="mt-1 flex flex-col gap-2">
                    <flux:file-item
                        :heading="$this->logoPreviewName()"
                        :image="$this->logoPreviewUrl()"
                        :size="$this->logoPreviewSize()"
                    >
                        <x-slot name="actions">
                            <flux:file-item.remove wire:click="removeLogo" />
                        </x-slot>
                    </flux:file-item>
                </div>
            @endif

            <flux:textarea
                wire:model="broker.description"
                :label="__('Description')"
                :placeholder="__('Optional short description')"
                rows="3"
            />

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
                <flux:switch wire:model="broker.is_file_upload" :label="__('File Upload Enabled')" align="left" />
                <flux:switch wire:model="broker.is_auto_sync" :label="__('Auto Sync Enabled')" align="left" />
            </div>

            <div class="flex gap-2">
                <flux:spacer />
                <flux:button variant="filled" color="zinc" type="button" wire:click="closeModal">Cancel</flux:button>
                <flux:button type="submit" variant="primary">Update Broker</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
