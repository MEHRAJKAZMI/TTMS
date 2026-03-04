<!DOCTYPE html>
<html><body>
<h1 style="text-align:center">Training Completion Certificate</h1>
<p>This certifies that <strong>{{ $teacher->name }}</strong> has successfully completed
<strong>{{ $class->name }}</strong> at {{ config('ttms.institution_name') }}.</p>
<p>Authorized by: {{ config('ttms.certificate_signatory') }}</p>
</body></html>
