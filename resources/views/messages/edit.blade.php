@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Редактировать сообщение</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('messages.update', $message->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="text_message" class="form-label">Текст сообщения</label>
                            <textarea class="form-control @error('text_message') is-invalid @enderror"
                                    id="text_message"
                                    name="text_message"
                                    rows="3"
                                    required>{{ old('text_message', $message->text_message) }}</textarea>
                            @error('text_message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bot_name" class="form-label">Имя бота</label>
                            <input type="text"
                                   class="form-control @error('bot_name') is-invalid @enderror"
                                   id="bot_name"
                                   name="bot_name"
                                   value="{{ old('bot_name', $message->bot_name) }}"
                                   required>
                            @error('bot_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="token" class="form-label">Токен</label>
                            <input type="text"
                                   class="form-control @error('token') is-invalid @enderror"
                                   id="token"
                                   name="token"
                                   value="{{ old('token', $message->token) }}"
                                   required>
                            @error('token')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('messages.index') }}" class="btn btn-secondary">Назад</a>
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
