<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @foreach ([['label' => 'Total Messages', 'value' => $total], ['label' => 'Today', 'value' => $today], ['label' => 'Last 7 days', 'value' => $week], ['label' => 'Unread', 'value' => $unread]] as $c)
        <div class="bg-white border rounded p-4">
            <div class="text-sm text-gray-500">{{ $c['label'] }}</div>
            <div class="text-3xl font-semibold mt-1">{{ $c['value'] }}</div>
        </div>
    @endforeach
</div>
