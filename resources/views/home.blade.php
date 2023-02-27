@extends('layouts.main')

@section('title', 'HOME')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Train code</th>
                <th>Company</th>
                <th>Departure station</th>
                <th>Arrival station</th>
                <th>Departure time</th>
                <th>Arrival time</th>
                <th>Number of carriages</th>
                <th>On time</th>
                <th>Is cancelled</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trains as $train)
                <tr class="@if ($train->is_cancelled) cancelled @elseif (!$train->on_time) delayed @endif">
                    <td>{{ $train->train_code }}</td>
                    <td>{{ $train->company }}</td>
                    <td>{{ $train->departure_station }}</td>
                    <td>{{ $train->arrival_station }}</td>
                    <td>{{ $train->departure_time }}</td>
                    <td>{{ $train->arrival_time }}</td>
                    <td>{{ $train->number_of_carriages }}</td>
                    <td>
                        @if ($train->on_time)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if ($train->is_cancelled)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
