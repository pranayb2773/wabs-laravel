<div>
    <div class="flex flex-col gap-6">
        <div class="flex w-full flex-col text-center">
            <flux:heading size="xl">{{ __('Create an account') }}</flux:heading>
            <flux:subheading>{{ __('Enter your details below to create your account') }}</flux:subheading>
        </div>

        <form method="POST" wire:submit="register" class="flex flex-col gap-6">
            <!-- Name -->
            <flux:input
                wire:model="name"
                :label="__('Name')"
                type="text"
                required
                autofocus
                autocomplete="name"
                :placeholder="__('Full name')"
            />

            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                required
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                required
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
                viewable
            />

            <div class="flex items-center">
                <flux:checkbox wire:model="terms" :label="__('I agree to the')" />

                <flux:modal.trigger name="terms-of-service">
                    <flux:link class="ml-1 text-sm cursor-pointer">
                        {{ __('Terms of Service') }}
                    </flux:link>
                </flux:modal.trigger>
            </div>

            <div class="flex items-center justify-end">
                <flux:button type="submit" variant="primary" class="flex-1" data-test="register-user-button">
                    {{ __('Create account') }}
                </flux:button>
            </div>
        </form>

        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            <span>{{ __('Already have an account?') }}</span>
            <flux:link :href="route('login')" wire:navigate>{{ __('Log in') }}</flux:link>
        </div>
    </div>

    <flux:modal
        name="terms-of-service"
        class="md:w-2xl dark:bg-zinc-900 dark:ring-zinc-800 bg-white ring-1 ring-zinc-100 rounded-2xl"
        :dismissible="false"
        :closeable="false"
        variant="bare"
    >
        <div>
            <div class="border-b border-b-zinc-200 dark:border-b-zinc-800 px-4 py-2">
                <flux:heading size="xl">{{ __('Terms of Service') }}</flux:heading>
                <flux:subheading class="mt-1">
                    {{ __('Please review and accept our terms to continue') }}
                </flux:subheading>
            </div>
            <div class="p-4 flex flex-col gap-6">
                <flux:card class="space-y-6 md:max-h-56 overflow-y-auto">
                    <div>
                        <flux:heading size="sm">{{ __('1. Acceptance of Terms') }}</flux:heading>
                        <flux:text>
                            {{ __('By accessing or using TradeHive\'s services, you agree to be bound by these Terms of Service, our Privacy Policy, and any additional posted guidelines. We may update these Terms at any time, and continued use constitutes acceptance.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('2. Eligibility') }}</flux:heading>
                        <flux:text>
                            {{ __('You must be at least 18 years old to use our Services. You agree to provide accurate registration information and maintain account security.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('3. Professional Trader Certification') }}</flux:heading>
                        <flux:text>
                            {{ __('By using TradeHive, you certify you are not a professional trader, are using the services for personal trading only, and do not trade for institutions or receive compensation for managing others\' trades. If your status changes, you must notify us immediately.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('4. Subscription & Billing') }}</flux:heading>
                        <flux:text>
                            {{ __('All purchases are final. Subscriptions auto-renew unless canceled at least 24 hours before renewal. Free trials convert to paid subscriptions unless canceled. Only one trial period is allowed every 6 months.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('5. Permitted Use') }}</flux:heading>
                        <flux:text>
                            {{ __('TradeHive grants you a limited license for personal use only. You may not copy, distribute, automate, scrape, resell, or redistribute our services or data. Account sharing is strictly prohibited; violations may result in suspension without refund.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('6. Prohibited Conduct') }}</flux:heading>
                        <flux:text class="mb-2">{{ __('You may not:') }}</flux:text>
                        <ul class="list-disc list-inside text-sm text-zinc-600 dark:text-zinc-400 space-y-1">
                            <li>{{ __('Use the Services for unlawful or fraudulent purposes') }}</li>
                            <li>{{ __('Manipulate markets or violate securities laws') }}</li>
                            <li>{{ __('Harass or abuse other users') }}</li>
                            <li>{{ __('Promote competing services within our platform') }}</li>
                        </ul>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('7. Market Data Disclaimer') }}</flux:heading>
                        <flux:text>
                            {{ __('TradeHive is not a registered investment adviser. All AI-generated insights are for educational purposes only. You are solely responsible for all trading decisions.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('8. Third-Party Services') }}</flux:heading>
                        <flux:text>
                            {{ __('We may integrate with brokers, data vendors, and APIs. We are not responsible for errors, delays, or outages caused by third parties.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('9. Service Availability') }}</flux:heading>
                        <flux:text>
                            {{ __('The Services are provided "as is" and "as available." We do not guarantee uninterrupted operation.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('10. Intellectual Property') }}</flux:heading>
                        <flux:text>
                            {{ __('All content, features, software, and trademarks on TradeHive are owned by us or our licensors. Unauthorized use is prohibited.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('11. Privacy & Data') }}</flux:heading>
                        <flux:text>
                            {{ __('We process data according to our Privacy Policy and applicable laws, including GDPR and CCPA.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('12. Limitation of Liability') }}</flux:heading>
                        <flux:text>
                            {{ __('We are not liable for indirect or consequential damages. Our total liability is limited to $1,000 or the fees paid in the last 12 months.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('13. Indemnification') }}</flux:heading>
                        <flux:text>
                            {{ __('You agree to indemnify and hold TradeHive harmless from any claims, damages, or expenses arising from your use of the Services or violation of these Terms.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('14. Termination') }}</flux:heading>
                        <flux:text>
                            {{ __('We may suspend or terminate accounts for Terms violations, fraudulent activity, or payment failures, without refund.') }}
                        </flux:text>
                    </div>
                    <div>
                        <flux:heading size="sm">{{ __('15. Governing Law') }}</flux:heading>
                        <flux:text>
                            {{ __('These Terms are governed by New York law. Disputes will be resolved through binding arbitration.') }}
                        </flux:text>
                    </div>
                </flux:card>
                <flux:card class="space-y-6">
                    <flux:checkbox
                        wire:model="tosAccepted"
                        :label="__('I have read and agree to the Terms of Service and Privacy Policy')"
                    />
                    <flux:checkbox wire:model="is18Plus" :label="__('I confirm that I am 18 years or older')" />
                    <flux:checkbox
                        wire:model="isProfessionalTrader"
                        :label="__('I can that I am not a professional trader and understand account sharing is prohibited')"
                    />
                </flux:card>
                <flux:callout variant="warning" icon="exclamation-triangle">
                    <flux:callout.text>
                        <b>Important:</b>
                        {{ __('Trading involves substantial risk of loss. TradeHive is NOT a registered investment adviser. Services are provided "as is" without guarantees. ') }}
                    </flux:callout.text>
                </flux:callout>
            </div>
            <div class="border-t border-t-zinc-200 dark:border-t-zinc-800 px-4 py-2 flex justify-end gap-x-2">
                <flux:button wire:click="$set('terms', false)" variant="filled">{{ __('Decline') }}</flux:button>
                <flux:button wire:click="$set('terms', true)" variant="primary">
                    {{ __('Agree & Continue') }}
                </flux:button>
            </div>
        </div>
    </flux:modal>
</div>
