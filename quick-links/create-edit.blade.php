<x-form>
    <x-form.text-field name="name" title="Name" autofocus="true" placeholder="Quicklink name" />
    <x-form.text-field name="link" title="Link" placeholder="https://google.com/search?q={query}" />
    <x-action-panel>
        <x-action.submit-form action="save" />
    </x-action-panel>
</x-form>