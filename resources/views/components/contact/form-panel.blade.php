@props([
    'budgets' => ['Less than $10k', '$10k-$50k', '$50k-$150k', '$150k+'],
])

<div class="contact-form" data-aos="fade-left">
    <form action="{{ route('contact.store') }}" method="POST" class="contact-form__panel" data-contact-form>
        @csrf
        <div class="contact-form__grid">
            <div class="contact-form__field">
                <label>{{ __('Full Name') }}</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="{{ __('John Doe') }}" required>
                @error('name')
                    <p class="contact-form__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="contact-form__field">
                <label>{{ __('Email Address') }}</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('john@company.com') }}" required>
                @error('email')
                    <p class="contact-form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="contact-form__grid">
            <div class="contact-form__field">
                <label>{{ __('Company Name') }}</label>
                <input type="text" name="company" value="{{ old('company') }}" placeholder="{{ __('Your Enterprise') }}">
                @error('company')
                    <p class="contact-form__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="contact-form__field">
                <label>{{ __('Phone Number') }}</label>
                <input type="text" name="phone" value="{{ old('phone') }}" placeholder="+966 55 878 1218">
                @error('phone')
                    <p class="contact-form__error">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="contact-form__field">
            <label>{{ __('Budget Range') }}</label>
            <select name="budget">
                <option value="" disabled {{ old('budget') ? '' : 'selected' }}>{{ __('Select a range') }}</option>
                @foreach($budgets as $budget)
                    <option value="{{ $budget }}" {{ old('budget') === $budget ? 'selected' : '' }}>{{ $budget }}</option>
                @endforeach
            </select>
            @error('budget')
                <p class="contact-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="contact-form__field">
            <label>{{ __('Project Details') }}</label>
            <textarea name="message" rows="5" placeholder="{{ __('Tell us about your objectives...') }}" required>{{ old('message') }}</textarea>
            @error('message')
                <p class="contact-form__error">{{ $message }}</p>
            @enderror
        </div>
        <div class="contact-form__actions">
            <button type="submit" class="btn-primary" data-contact-submit data-submitting="{{ __('Sending...') }}">
                {{ __('Submit Inquiry') }}
            </button>
        </div>
    </form>
</div>
