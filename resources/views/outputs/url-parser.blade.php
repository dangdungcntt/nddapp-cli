<table>
    <tbody>
    <tr>
        <th>Base URL</th>
        <td>{{ $data['base_url'] }}</td>
    </tr>
    <tr>
        <th colspan="2">Query</th>
    </tr>
    @foreach($data['query'] as $field => $value)
        <tr>
            <td>{{ $field }}</td>
            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
