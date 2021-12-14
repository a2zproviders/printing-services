@foreach($colorArr as $i => $c)
@if(@$edit->color_id == $i)
<option value="{{ $i }}" selected>{{ $c }}</option>
@else
<option value="{{ $i }}">{{ $c }}</option>
@endif
@endforeach