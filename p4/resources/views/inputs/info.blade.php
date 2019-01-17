<fieldset>
    <legend>Listing Information:</legend>
    <label for='address'>* Address</label>
    <input type='text' name='address' id='address' value='{{ old('address', $listing->address) }}'>
    @include('modules.error-field', ['field' => 'address'])

    <label for='city'>* City</label>
    <input type='text' name='city' id='city' value='{{ old('city', $listing->city) }}'>
    @include('modules.error-field', ['field' => 'city'])

    <label for='state'>* State (e.g. MA)</label>
    <input type='text' maxlength='2' name='state' id='state' value='{{ old('state', $listing->state) }}'>
    @include('modules.error-field', ['field' => 'state'])

    <label for='zip'>* Zip</label>
    <input type='text' maxlength='5' name='zip' id='zip' value='{{ old('zip', $listing->zip) }}'>
    @include('modules.error-field', ['field' => 'zip'])

    <label for='price'>Price</label>
    <input type='number' min='0' name='price' id='price' value='{{ old('price', $listing->price) }}'>
    @include('modules.error-field', ['field' => 'price'])

    <label for='date_available'>Date Available (mm/dd/yyyy)</label>
    <input type='date'
           name='date_available'
           id='date_available'
           value='{{ old('date_available', $listing->date_available) }}'>
    @include('modules.error-field', ['field' => 'date_available'])

    <label for='reference_url'> Reference URL</label>
    <input type='url'
           name='reference_url'
           id='reference_url'
           placeholder='http://'
           value='{{ old('reference_url', $listing->reference_url) }}'>
    @include('modules.error-field', ['field' => 'reference_url'])

    <label for='beds'> Beds</label>
    <input type='number' min='0' name='beds' id='beds' value='{{ old('beds', $listing->beds) }}'>

    <label for='baths'> Baths</label>
    <input type='number' min='0' name='baths' id='baths' value='{{ old('baths', $listing->baths) }}'>

    <label for='sqft'> Square Feet</label>
    <input type='number' min='0' name='sqft' id='sqft' value='{{ old('sqft', $listing->sqft) }}'>
</fieldset>