{{-- https://shouts.dev/articles/laravel-two-factor-authentication-with-google-authenticator --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('2FA') }}
        </h2>
    </x-slot>
    <br>
<div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap  md:justify-center">
            <div class="md:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-gray-200 border-b-1 border-gray-300 text-gray-900"><strong>Two Factor Authentication</strong></div>
                    <div class="flex-auto p-6">

                        @if($data['user']->loginSecurity->google2fa_enable)
                        
                        <div class="p-6 border-l-4 border-green-500 -6 rounded-r-xl bg-green-50">
                            2FA is currently <strong>enabled</strong> on your account.
                        </div><br>

                        @endif

                        <p>Two factor authentication (2FA) strengthens access security by requiring two methods (also referred to as factors) to verify your identity. Two factor authentication protects against phishing, social engineering and password brute force attacks and secures your logins from attackers exploiting weak or stolen credentials.</p>

                        @if($data['user']->loginSecurity == null)
                            <form class="form-horizontal" method="POST" action="{{ route('generate2faSecret') }}">
                                {{ csrf_field() }}
                                <div class="mb-4">
                                    <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                        Generate Secret Key to Enable 2FA
                                    </button>
                                </div>
                            </form>
                        @elseif(!$data['user']->loginSecurity->google2fa_enable)
                        </br>
                            1. Enter the code <code class="rounded border border-gray-100 bg-pink-100 px-3 py-1 text-xs font-medium text-pink-800">{{ $data['secret'] }}</code> into your authenticator app<br/>
                            {{-- <img src="{{$data['google2fa_url'] }}" alt=""> --}}
                            2. Enter the pin from your authenticator app below &#128071;<br/><br/>
                            <form class="form-horizontal" method="POST" action="{{ route('enable2fa') }}">
                                {{ csrf_field() }}
                                <div class="mb-4{{ $errors->has('verify-code') ? ' has-error' : '' }}">
                                    <label for="secret" class="control-label">Authenticator Code</label>
                                    <input id="secret" type="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded md:w-1/3 pr-4 pl-4" name="secret" required>
                                    @if ($errors->has('verify-code'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('verify-code') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <x-primary-button type="submit">
                                    Enable 2FA
                                </x-primary-button>
                            </form>
                        @elseif($data['user']->loginSecurity->google2fa_enable)
                        <br/>
                            <p>If you are looking to disable Two Factor Authentication. Please confirm your password and Click Disable 2FA Button.</p>
                            <br/><form class="form-horizontal" method="POST" action="{{ route('disable2fa') }}">
                                {{ csrf_field() }}
                                <div class="mb-4{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                    <x-input-label for="change-password">Current Password</x-input>
                                        <x-text-input id="current-password" class="mt-1 block w-full" type="password" name="current-password" required />
                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                        </span>
                                        @endif
                                </div>
                                <x-primary-button type="submit">
                                    Disable 2FA
                                </x-primary-button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>