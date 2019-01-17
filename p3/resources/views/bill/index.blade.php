@extends('layouts.master')

@section('title')
    Bill Splitter
@endsection

@section('content')
    <h3>Need to split a check between a group of people?
        Enter the information below and press calculate.</h3>

    <form method='GET' action='/check'>
        <p>
            <label for='numSplit'>Split how many ways?*
                <input type='text' name='numSplit' id='numSplit' value='{{ old('numSplit', $numSplit) }}'>
            </label>
            @include('modules.error-field', ['field' => 'numSplit'])
        </p>
        <p>
            <label for='billTotal'>How much was the bill?*
                <input type='text' name='billTotal' id='billTotal' value='{{ $billTotal or old('billTotal') }}'>
            </label>
            @include('modules.error-field', ['field' => 'billTotal'])
        </p>
        <p>
            <label for='tip'>How much tip would you like to add?</label>
            <select name='tip' id='tip'>
                @foreach($tipValues as $value => $percent)
                    <option value='{{$value}}' {{ old('tip', $tip) == $value ? 'selected' : ''}}>{{ $percent }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <label for='round'>Round up?
                <input type='checkbox'
                       name='round'
                       id='round'
                       value='1' {{ old('round', $round) ? 'checked' : '' }}><br/>
            </label>
        </p>
        <p>
            <input type='submit' value='Calculate'>
        </p>

    </form>

    <p class='required'>* Required fields</p>
    @if(count($errors) > 0)
        <ul class='warning'>
            @foreach ($errors->all() as $error)
                <li class='bullet'>{{ $error }}</li>
            @endforeach
        </ul>
    @elseif($submitted == true)
        <div class='results'>
            <p>The total, with {{ $tip }}% tip, comes out to: ${{$totalTip}}
            <p>Split {{ $numSplit }} ways, everyone owes ${{$share }} each.</p>
            @if($round == 1)
                <p>With rounding, there will be ${{ $remainder }} left over.</p>
            @endif
        </div>
    @endif


@endsection