<?php
 
use function Livewire\Volt\{uses, state};

uses([App\Items::class]);

state([
    'emoji' => [
        '😀' => 'grinning face',
        '😃' => 'grinning face with big eyes',
        '😄' => 'grinning face with smiling eyes',
        '😁' => 'beaming face with smiling eyes',
        '😆' => 'grinning squinting face',
        '😅' => 'grinning face with sweat',
        '🤣' => 'rolling on the floor laughing',
        '😂' => 'face with tears of joy',
        '😤' => 'face with tears of joy',
        '😠' => 'face with tears of joy',
        '😡' => 'face with tears of joy',
        '🤬' => 'face with tears of joy',
        '🤯' => 'face with tears of joy',
        '😳' => 'face with tears of joy',
        '🥵' => 'face with tears of joy',
]]);

?>

<x-grid :columns="8">
    @foreach ($emoji as $smile => $emoji)
        <x-grid-item :title="$emoji">
            {{ $smile }}
            <x-action-panel>
                <x-action.copy-to-clipboard title="Copy emoji" :content="$smile" />
            </x-action-panel>
        </x-grid-item>
    @endforeach
</x-grid>