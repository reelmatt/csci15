<fieldset>
    <legend>Apartment Features:</legend>
    @foreach($featuresForCheckboxes as $featureId => $featureName)
        <ul>
            <li class='feature'>
                <label>
                    <input
                        {{ (in_array($featureId, $features)) ? 'checked' : '' }}
                        type='checkbox'
                        name='features[]'
                        value='{{ $featureId }}'>
                    {{ $featureName }}
                </label>
            </li>
        </ul>
    @endforeach
</fieldset>