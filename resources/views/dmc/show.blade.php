<!DOCTYPE html>
<html><body>
<h2>Detailed Marks Certificate</h2>
<p>Teacher: {{ $teacher->name }} | Class: {{ $class->name }}</p>
<table border="1" width="100%" cellspacing="0" cellpadding="6">
    <tr><th>Subject</th><th>Total</th><th>Obtained</th></tr>
    @foreach($subjects as $subject)
    <tr><td>{{ $subject['name'] }}</td><td>{{ $subject['total'] }}</td><td>{{ $subject['obtained'] }}</td></tr>
    @endforeach
</table>
</body></html>
