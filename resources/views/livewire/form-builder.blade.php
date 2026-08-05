<div class="container mt-4">

    <h2>Form Builder</h2>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.6/Sortable.min.js"></script>
    {{-- Add Field Buttons --}}
    <div class="mb-3">
        <button wire:click="addField('text')" class="btn btn-primary">+ Text</button>
        <button wire:click="addField('email')" class="btn btn-success">+ Email</button>
        <button wire:click="addField('number')" class="btn btn-warning">+ Number</button>
       
    </div>

    <div>

            @foreach($fields as $field)

                <div>

                    <strong>{{ $field['label'] }}</strong>

                    <button wire:click="edit({{ $field['id'] }})">
                        Edit
                    </button>
                    <button wire:click="deleteField({{ $field['id'] }})" class="btn btn-danger btn-sm">
                       Delete
                    </button>

                    <button wire:click="duplicateField({{ $field['id'] }})">
                      Duplicate
                    </button>

                </div>

            @endforeach

            @if($editingField)

                <div class="mt-4">

                    <input type="text" wire:model="label">

                    <input type="text" wire:model="placeholder">

                    <input type="checkbox" wire:model="required">

                    <button wire:click="updateField">
                        Save
                    </button>

                </div>

            @endif

          
        <div id="field-list">

            @foreach($fields as $field)

                <div class="border p-3 mb-2" data-id="{{ $field['id'] }}">
                    {{ $field['label'] }}
                </div>

            @endforeach

        </div> 
    </div>

</div>



<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<script>

new Sortable(document.getElementById('field-list'), {

    animation: 150

});

</script>