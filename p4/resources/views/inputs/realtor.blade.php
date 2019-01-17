<fieldset>
    <legend>Realtor Info:</legend>

    @if($realtorEdit)
        <label for='first_name'>* First Name</label>
        <input type='text'
               name='first_name'
               id='first_name'
               value='{{ old('first_name', $realtor->first_name) }}'>
        @include('modules.error-field', ['field' => 'first_name'])

        <label for='last_name'>* Last Name</label>
        <input type='text' name='last_name' id='last_name' value='{{ old('last_name', $realtor->last_name) }}'>
        @include('modules.error-field', ['field' => 'last_name'])

        <label for='company'>* Company</label>
        <input type='text' name='company' id='company' value='{{ old('company', $realtor->company) }}'>
        @include('modules.error-field', ['field' => 'company'])

        <label for='phone'>* Phone</label>
        <input type='text' name='phone' id='phone' value='{{ old('phone', $realtor->phone) }}'>
        @include('modules.error-field', ['field' => 'phone'])

        <label for='email'>* Email</label>
        <input type='text' name='email' id='email' value='{{ old('email', $realtor->email) }}'>
        @include('modules.error-field', ['field' => 'email'])
    @else
        <label for='realtor_id'>* Realtor</label>
        <select name='realtor_id' id='realtor_id'>
            <option value=''>Choose one...</option>
            @foreach($realtorsForDropdown as $id => $realtorName)
                <option value='{{$id}}' {{ ($listing->realtor_id == $id) ? 'selected' : ''}}>{{$realtorName}}</option>
            @endforeach
        </select>
        @include('modules.error-field', ['field' => 'realtor_id'])
        <small class="form-text text-muted">To add a new realtor not listed here, please first visit the
            <a href='/realtors/create'>New Realtor</a> link in the nav.
        </small>
    @endif
</fieldset>