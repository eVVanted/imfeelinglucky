<?php
/* @var $errors \Illuminate\Support\MessageBag */
?>
@extends('layout')

@section('title', 'Home')

@section('content')
    <div class="d-flex justify-content-center align-items-center">
        <div class="card shadow-sm col-3">
            <div class="card-body">
                @if(session('link'))
                    <div class="alert alert-success mt-3">
                        <a href="{{ route('a', ['link' => session('link')]) }}">{{session('link')}}</a>
                    </div>
                @else
                    <form method="POST" action="{{ route('register') }}" class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="subject">Username</label>
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   type="text"
                                   name="name"
                                   id="name"
                                   value="{{ old('name', '') }}"
                                   required
                            >
                            @if($errors->has('name'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="subject">Phonenumber</label>
                            <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                   type="text"
                                   name="phone"
                                   id="phone"
                                   value="{{ old('phone', '') }}"
                                   required
                            >
                            @if($errors->has('phone'))
                                <span class="invalid-feedback">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                @endif
            </div>
        </div>
    </div>>
@endsection
