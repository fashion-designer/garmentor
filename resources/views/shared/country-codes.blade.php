<div class="form-group">
    <label for="phone" class="col-md-12 control-label">Phone</label>
    <div class="row" style="padding: 0 35px 0 35px;">
        <div class="col-lg-5 garmentor-m-b-3">
            <select class="form-control{{ $errors->has('phone') ? ' has-error' : '' }}" name="country_code" id="country_code">
                @foreach(config('country_codes') as $countryData)
                    @if(isset($selectedCountryCode))
                        <option value="{!! $countryData[0] !!}" {!! ($countryData[0] === $selectedCountryCode) ? 'selected' : '' !!}>
                            {!! $countryData[0] !!}
                        </option>
                    @else
                        <option value="{!! $countryData[0] !!}" {!! ($countryData[1] === 'India') ? 'selected' : '' !!}>
                            {!! $countryData[0] !!}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-lg-7 garmentor-m-b-3">
            <input type="number" class="form-control" name="phone" placeholder="enter phone" value="{!! (isset($selectedPhone)) ? $selectedPhone : '' !!}" required>
        </div>
    </div>
    @if ($errors->has('phone'))
        <div class="error">
            {{ $errors->first('email') }}
        </div>
    @endif
</div>