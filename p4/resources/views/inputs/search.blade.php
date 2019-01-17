<fieldset>
    <legend>Listing Information:</legend>
    <label for='price'>Maximum Price</label>
    <input type='number' min='0' name='price' id='price' value='{{ old('price') }}'>
    @include('modules.error-field', ['field' => 'price'])

    <label for='beds'>Minimum # of Beds</label>
    <input type='number' min='0' name='beds' id='beds' value='{{ old('beds') }}'>
    @include('modules.error-field', ['field' => 'beds'])

    <label for='baths'>Minimum # of Baths</label>
    <input type='number' min='0' name='baths' id='baths' value='{{ old('baths') }}'>
    @include('modules.error-field', ['field' => 'baths'])

    <label for='sqft'>Minimum Square Feet</label>
    <input type='number' min='0' name='sqft' id='sqft' value='{{ old('sqft') }}'>
    @include('modules.error-field', ['field' => 'sqft'])
</fieldset>
<fieldset>
    <legend>Apartment Features Included:</legend>
    <ul>
        @foreach($featuresForCheckboxes as $featureId => $featureName)
            <li class='feature'>
                <label>
                    <input
                        type='checkbox'
                        name='features[]'
                        value='{{ $featureId }}'
                        id='{{$featureName}}'>
                    {{ $featureName }}
                </label>
            </li>
        @endforeach
    </ul>
</fieldset>