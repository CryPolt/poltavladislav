@csrf
<div class="form-group">
    <input type="text" class="form-control" name="title" maxlength="100"
           placeholder="Заголовок" required value="{{ $post->title ?? '' }}">
</div>
<div class="form-group">
            <textarea class="form-control" name="excerpt" maxlength="200"
                      placeholder="Анонс поста" required>{{ $post->excerpt ?? '' }}</textarea>
</div>
<div class="form-group">
            <textarea class="form-control" name="body"
                      placeholder="Текст поста" rows="7" required>{{ $post->body ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image">
</div>
@isset($post->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Удалить загруженное <a href="{{ $post->image }}" target="_blank">изображение</a>
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-primary">Сохранить</button>
</div>
