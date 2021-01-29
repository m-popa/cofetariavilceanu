<!-- text input -->
@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    @if(isset($field['prefix']) || isset($field['suffix'])) <div class="input-group"> @endif
        @if(isset($field['prefix'])) <div class="input-group-prepend"><span class="input-group-text">{!! $field['prefix'] !!}</span></div> @endif

        @php
            $model = $crud->entry ? $crud->entry : $crud->model;
        @endphp

        <x-media-library-collection
            name="images"
            :model="$model"
            collection="images"
            max-items="10"
            rules="mimes:jpeg,jpg"
        />
        @if(isset($field['suffix'])) <div class="input-group-append"><span class="input-group-text">{!! $field['suffix'] !!}</span></div> @endif
    @if(isset($field['prefix']) || isset($field['suffix'])) </div> @endif

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
</div>

@push('after_styles')
<link href="{{ asset('css/spatie.css') }}" rel="stylesheet">
<livewire:styles />
@endpush

@push('after_scripts')
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.min.js" defer></script>
<livewire:scripts />
@endpush