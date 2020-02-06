					<div class="form-group col-sm-12">

						@if(count($department) > 0)
							<fieldset>
							<label>{{trans('admin.sub_to')}}</label>
							<select name="parent" class="form-control checkparent">
								<option master="master" value="{{$parent}}" @if($parent == old('parent')) selected @endif >{{trans('admin.master_department')}}</option>
								@foreach($department as $dep)
								<option value="{{$dep->id}}" @if(old('parent') == $dep->id) selected @endif >{{$dep->en_name}}</option>
								@endforeach
							</select>	
					 
							</fieldset>
						@endif
					</div>