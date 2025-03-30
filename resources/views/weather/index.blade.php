@extends('layouts.app')

@section('content')
    <h1>Weather Data</h1>
    <form method="GET">
        <input type="text" name="city" placeholder="Filter by city" value="{{ request('city') }}">
        <button type="submit">Search</button>
    </form>

    <table>
        <tr>
            <th>City</th>
            <th>Data</th>
            <th>Timestamp</th>
        </tr>
        @foreach($weatherData as $data)
            <tr>
                <td>{{ $data->city }}</td>
                <td>{{ json_encode($data->response_json) }}</td>
                <td>{{ $data->created_at }}</td>
            </tr>
        @endforeach
    </table>

    {{ $weatherData->links() }}
@endsection
