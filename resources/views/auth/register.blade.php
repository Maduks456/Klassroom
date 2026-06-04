<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=DM+Mono:wght@400;500&display=swap');

        *, *::before, *::after {
            box-sizing: border-box;
        }

        .register-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            padding: 2rem 1rem;
            font-family: 'DM Sans', sans-serif;
        }

        .register-card {
            width: 100%;
            max-width: 380px;
            background: #f7f7f5;
            border-radius: 18px;
            padding: 2.25rem 2rem;
            border: 1px solid #ebebea;
            animation: fadeUp 0.4s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .register-eyebrow {
            font-family: 'DM Mono', monospace;
            font-size: 11px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #aaa;
            margin: 0 0 14px;
        }

        .register-heading {
            margin: 0 0 6px;
            font-size: 26px;
            font-weight: 600;
            color: #0a0a0a;
            line-height: 1.2;
            letter-spacing: -0.5px;
        }

        .register-subheading {
            margin: 0 0 2.25rem;
            font-size: 13.5px;
            color: #999;
            font-weight: 400;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 1.1rem;
        }

        .form-field {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            color: #555;
            margin-bottom: 7px;
            letter-spacing: 0.02em;
        }

        .form-input {
            width: 100%;
            padding: 10px 13px;
            font-size: 14px;
            font-family: 'DM Sans', sans-serif;
            border: 1.5px solid #e0e0de;
            border-radius: 8px;
            background: #ffffff;
            color: #0a0a0a;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .form-input:focus {
            border-color: #0a0a0a;
            box-shadow: 0 0 0 3px rgba(10,10,10,0.06);
        }

        .form-input::placeholder {
            color: #ccc;
        }

        .form-error {
            font-size: 12px;
            color: #c0392b;
            margin-top: 5px;
            font-weight: 400;
        }

        .divider {
            width: 100%;
            height: 1px;
            background: #f0f0f0;
            margin: 0.35rem 0;
        }

        .register-btn {
            width: 100%;
            padding: 11px;
            font-size: 14px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
            background: #0a0a0a;
            color: #fff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            letter-spacing: 0.02em;
            transition: background 0.15s ease, transform 0.1s ease;
            margin-top: 0.15rem;
        }

        .register-btn:hover {
            background: #222;
        }

        .register-btn:active {
            transform: scale(0.99);
        }

        .register-footer {
            margin: 1.5rem 0 0;
            text-align: center;
            font-size: 13px;
            color: #aaa;
        }

        .register-footer a {
            color: #0a0a0a;
            font-weight: 500;
            text-decoration: none;
            border-bottom: 1px solid #0a0a0a;
            padding-bottom: 1px;
            transition: opacity 0.15s ease;
        }

        .register-footer a:hover {
            opacity: 0.6;
        }
    </style>

    <div class="register-wrapper">
        <div class="register-card">
            <p class="register-eyebrow">Get started</p>
            <h2 class="register-heading">Create your account</h2>
            <p class="register-subheading">Fill in your details below to continue.</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">

                    <!-- Name -->
                    <div class="form-field">
                        <label class="form-label" for="name">Full name</label>
                        <input
                            class="form-input"
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Jane Doe"
                            required
                            autofocus
                            autocomplete="name"
                        />
                        @error('name')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-field">
                        <label class="form-label" for="email">Email address</label>
                        <input
                            class="form-input"
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="jane@example.com"
                            required
                            autocomplete="username"
                        />
                        @error('email')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="divider"></div>

                    <!-- Password -->
                    <div class="form-field">
                        <label class="form-label" for="password">Password</label>
                        <input
                            class="form-input"
                            id="password"
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        />
                        @error('password')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-field">
                        <label class="form-label" for="password_confirmation">Confirm password</label>
                        <input
                            class="form-input"
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            placeholder="••••••••"
                            required
                            autocomplete="new-password"
                        />
                        @error('password_confirmation')
                            <span class="form-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <button type="submit" class="register-btn">Create account</button>

                </div>
            </form>

            <p class="register-footer">
                Already have an account?
                <a href="{{ route('login') }}">Sign in</a>
            </p>
        </div>
    </div>
</x-guest-layout>