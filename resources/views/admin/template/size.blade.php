@foreach($sizeArr as $i => $c)
@if(@$edit->size_id == $i)
<option value="{{ $i }}" selected>{{ $c }}</option>
@else
<option value="{{ $i }}">{{ $c }}</option>
@endif
@endforeach