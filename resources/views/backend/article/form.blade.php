<div class="row">
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            <div>{{ $errors->first('name') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('categorie_id', 'Kategorie') }}
            {{ Form::select('categorie_id', $categorie, null, ['placeholder' => 'Kategorie', 'class' => 'form-control'] ) }}
            <div>{{ $errors->first('categorie_id') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('manufacturer_id', 'Hersteller') }}
            {{ Form::select('manufacturer_id', $manufacturer, null, ['placeholder' => 'Hersteller','class' => 'form-control']) }}
            <div>{{ $errors->first('manufacturer_id') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('tags_id', 'Tags') }}
            {{ Form::select('tags_id[]', $tags, $selected, ['multiple'=>'multiple', 'class' => 'form-control']) }}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group">
            {{ Form::label('price', 'Preis') }}
            {{ Form::number('price', null, ['class' => 'form-control']) }}
            <div>{{ $errors->first('price') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('description', 'Beschreibung') }}
            {{ Form::text('description', null, ['class' => 'form-control']) }}
            <div>{{ $errors->first('description') }}</div>
        </div>
        <div class="form-group">
            {{ Form::label('status', 'Status') }}
            {{ Form::select('status', $status, null, ['class' => 'form-control']) }}
            <div>{{ $errors->first('status') }}</div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    {{ Form::label('articleImage', 'Artikelbild') }}
                    {{ Form::file('articleImage', ['class' => 'form-control-file']) }}
                    <div>{{ $errors->first('articleImage') }}</div>
                </div>
                @if($action == 'edit')
                    <a href="{{ route('article.image.delete', $article->id) }}" class="btn btn-danger">Delete Image</a>
                @endif
            </div>
            <div class="col-6">
                @if($action == 'edit')
                    <img src="{{ Storage::disk('articleImages')->url($article->articleImage) }}?{{ time() }}" style="height: 200px;">
                @endif
            </div>
        </div>

    </div>
</div>


{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
