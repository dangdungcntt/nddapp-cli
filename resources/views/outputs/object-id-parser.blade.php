<table>
    <thead>
    <tr>
        <th colspan="2">Created At: {{ \Illuminate\Support\Carbon::parse($data['timestamp'])->toIso8601String() }}</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <th>Timestamp</th>
        <td>{{ $data['timestamp'] }}</td>
    </tr>
    <tr>
        <th>Machine Identifier</th>
        <td>{{ $data['machine_identifier'] }}</td>
    </tr>
    <tr>
        <th>Process Identifier</th>
        <td>{{ $data['process_identifier'] }}</td>
    </tr>
    <tr>
        <th>Counter</th>
        <td>{{ $data['counter'] }}</td>
    </tr>
    </tbody>
</table>
