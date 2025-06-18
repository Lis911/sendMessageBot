@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="float-start">Сообщения</h2>
                    <a href="{{ route('messages.create') }}" class="btn btn-primary float-end">Создать сообщение</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Текст сообщения</th>
                                    <th>Имя бота</th>
                                    <th>Дата создания</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($messages as $message)
                                    <tr>
                                        <td>{{ $message->id }}</td>
                                        <td>{{ $message->text_message }}</td>
                                        <td>{{ $message->bot_name }}</td>
                                        <td>{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('messages.edit', $message->id) }}"
                                                   class="btn btn-sm btn-primary">
                                                   <i class="fas fa-edit"></i> Редактировать
                                                </a>

                                                <form action="{{ route('messages.destroy', $message->id) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Вы уверены, что хотите удалить это сообщение?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i> Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
