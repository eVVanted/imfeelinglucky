<?php
/* @var $link \App\Models\AccessLink */
/* @var $history \Illuminate\Database\Eloquent\Collection|\App\Models\LuckyResult[]|null */
?>
@extends('layout')

@section('title', isset($history) ? 'History' : 'Page A')

@section('content')
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="h4 mb-4">Current link {{$link->ulid}}</h1>

            <form method="POST" action="{{ route('link.generate-new', $link->ulid) }}" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-primary w-100">Generate new link</button>
            </form>

            <form method="POST" action="{{ route('link.deactivate', $link->ulid) }}" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-danger w-100">Deactivate link</button>
            </form>

            <form method="POST" action="{{ route('a.play-i-am-lucky-game', $link->ulid) }}" class="mb-2">
                @csrf
                <button type="submit" class="btn btn-success w-100">Imfeelinglucky</button>
            </form>

            <a href="{{ route('a.i-am-lucky-games-history', $link->ulid) }}" class="btn btn-secondary w-100">
                History
            </a>

            @if(session('lucky'))
                @include('_lucky-result', [
                    'roll'   => session('lucky.roll'),
                    'isWin'  => session('lucky.isWin'),
                    'amount' => session('lucky.amount')
                ])
            @endif

            @if(isset($history))
                @forelse($history as $luckyResult)
                    @include('_lucky-result', [
                        'roll'   => $luckyResult->roll,
                        'isWin'  => $luckyResult->isWin(),
                        'amount' => $luckyResult->getAmountAsMoney()
                    ])
                @empty
                    <div class="alert alert-info mt-3">
                        You should play at least one game
                    </div>
                @endforelse
            @endif
        </div>
    </div>
@endsection
