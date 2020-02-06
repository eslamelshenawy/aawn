						@if(count($department) > 0)
							<fieldset>
							<label>{{trans('main.sub_to')}}</label>
							<select name="parent" class="form-control checkparent">
								<option master="master" value="{{$parent}}" @if($parent == old('parent')) selected @endif >{{trans('main.master_department')}}</option>
								@foreach($department as $dep)
								<option value="{{$dep->id}}" @if(old('parent') == $dep->id) selected @endif >{{$dep->en_name}}</option>
								@endforeach
							</select>	
					 
							</fieldset>
						@endif