<h2>Tarife</h2>
{{ Form::open(['route' => ['article.tarif', $article->id], 'method' => 'PATCH']) }}

<table class="table table-bordered">
    <thead>
        <th>#</th>
        <th>Preis</th>
        <th>Tarif</th>
        <th>Provider</th>
        <th>Monatlicher Preis</th>
        <th>Anschlusspreis</th>
    </thead>
    <tbody>
        @foreach($tarife as $tarif)
            <tr>
                <td>{{ Form::checkbox('tarif['.$tarif->id.'][status]',1 , (array_key_exists($tarif->id, $selectedTarif)) ? $selectedTarif[$tarif->id]['status'] : 0 ,['class' => 'form-control']) }}</td>
                <td>{{ Form::number('tarif['.$tarif->id.'][price]', (array_key_exists($tarif->id, $selectedTarif)) ? $selectedTarif[$tarif->id]['price'] : '', ['class' => 'form-control']) }}</td>
                <td>{{ $tarif->name }} {!! ($tarif->status) ? '' : '</br><small>Inactive</small>' !!}</td>
                <td>{{ $tarif->provider->name }}</td>
                <td>{{ $tarif->monthly_price }}</td>
                <td>{{ $tarif->connection_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
{{ Form::close() }}
