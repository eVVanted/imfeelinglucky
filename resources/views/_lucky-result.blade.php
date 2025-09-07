<div class="alert alert-{{ $isWin ? 'success' : 'danger' }} mt-3">
    Roll: <strong>{{ $roll }}</strong> —
    {{ $isWin ? 'Win' : 'Lose' }}
    ({{ $amount }})
</div>
