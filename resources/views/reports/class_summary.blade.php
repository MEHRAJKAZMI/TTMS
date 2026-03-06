<!DOCTYPE html>
<html><body>
<h2>Class Summary Report</h2>
<p>Class: {{ $class->name }} ({{ $class->category->value }})</p>
<p>Total Enrolled: {{ $class->teachers()->count() }}</p>
</body></html>
