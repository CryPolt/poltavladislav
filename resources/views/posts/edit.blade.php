@extends('layouts.site')

@section('content')
    <h1 class="mt-2 mb-3">Редактировать пост</h1>
    <form method="post" action="{{ route('post.update', ['id' => $post->post_id]) }}"
          enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input type="text" class="form-control" name="title"
                   placeholder="Заголовок" required value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="excerpt"
                      placeholder="Анонс поста" required>{{ $post->excerpt }}</textarea>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="body"
                      placeholder="Текст поста" rows="7" required>{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control-file" name="image">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
    <form action="{{ route('post.delete', ['id' => $post->post_id]) }}"
        method="post" onsubmit="return confirm('Удалить этот пост?')"
        class="d-inline">
      @csrf
      @method('DELETE')
      <input type="submit" class="btn btn-danger" value="Удалить">
  </form>
@endsection
