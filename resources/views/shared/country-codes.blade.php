<div class="form-group">
    <label>Phone</label>
    <div class="row">
        <div class="col-lg-4">
            <select class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="country_code" id="country_code">
                @foreach(config('country_codes') as $countryData)
                    @if(isset($selectedCountryCode))
                        <option value="{!! $countryData[0] !!}" {!! ($countryData[0] === $selectedCountryCode) ? 'selected' : '' !!}>
                            {!! $countryData[1] !!} ({!! $countryData[0] !!})
                        </option>
                    @else
                        <option value="{!! $countryData[0] !!}" {!! ($countryData[1] === 'India') ? 'selected' : '' !!}>
                            {!! $countryData[1] !!} ({!! $countryData[0] !!})
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-lg-8">
            <input type="number" class="form-control" name="phone" placeholder="Enter phone here" value="{!! (isset($selectedPhone)) ? $selectedPhone : '' !!}" required>
        </div>
        @if ($errors->has('phone'))
            <span class="help-block hyd-color-red">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>