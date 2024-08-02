<x-acc-with-alert>
    <h1 class="h3 mb-3">
        {{ $title ?? '' }}
    </h1>
    <div class="row">
        <div class="col-md-3 col-xl-2">
            @include('livewire.cms.management.setting.a-sidebar')
        </div>
        <div class="col-md-9 col-xl-10">
            <div class="card">
                <div class="card-body">
                    <x-acc-form submit="customSave">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Privacy Policy</label>
                                <x-acc-input type="textarea" :live="true" model="form.privacy_policy" placeholder="Privacy Policy" rows="15" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Preview Privacy Policy</label>
                                <x-markdown>{{ $form->privacy_policy }}</x-markdown>
                            </div>
                        </div>
                    </x-acc-form>
                </div>
            </div>
        </div>
    </div>
</x-acc-with-alert>
