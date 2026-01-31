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
                :label="__('Full Name')"
                type="text"
                autofocus
                autocomplete="name"
                :placeholder="__('Full name')"
            />

            <!-- Email Address -->
            <flux:input
                wire:model="email"
                :label="__('Email address')"
                type="email"
                autocomplete="email"
                placeholder="email@example.com"
            />

            <!-- Password -->
            <flux:input
                wire:model="password"
                :label="__('Password')"
                type="password"
                autocomplete="new-password"
                :placeholder="__('Password')"
                viewable
            />

            <!-- Confirm Password -->
            <flux:input
                wire:model="password_confirmation"
                :label="__('Confirm password')"
                type="password"
                autocomplete="new-password"
                :placeholder="__('Confirm password')"
                viewable
            />

            <flux:field variant="inline">
                <flux:checkbox wire:model="terms" />

                <flux:label>
                    <span>I agree to the</span>
                    <flux:modal.trigger name="terms-of-service">
                        <flux:link class="ml-1 text-sm cursor-pointer">
                            {{ __('Terms of Service') }}
                        </flux:link>
                    </flux:modal.trigger>
                </flux:label>

                <flux:error name="terms" />
            </flux:field>

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
        class="md:w-2xl bg-white dark:bg-zinc-900 ring-1 ring-zinc-200 dark:ring-zinc-800 rounded-2xl shadow-xl"
        :dismissible="false"
        :closeable="false"
        variant="bare"
    >
        <div class="flex flex-col max-h-[85vh]">
            <!-- Header -->
            <div
                class="shrink-0 border-b border-zinc-200 dark:border-zinc-800 px-6 py-5 bg-linear-to-r from-zinc-50 to-white dark:from-zinc-900 dark:to-zinc-800/50 rounded-t-2xl"
            >
                <div class="flex items-center gap-3">
                    <div
                        class="flex items-center justify-center size-10 rounded-full bg-violet-100 dark:bg-violet-900/30"
                    >
                        <flux:icon.document-text class="size-6 text-violet-600 dark:text-violet-400" />
                    </div>
                    <div>
                        <flux:heading size="lg">{{ __('Terms of Service') }}</flux:heading>
                        <flux:subheading class="text-zinc-500 dark:text-zinc-400">
                            {{ __('Please review and accept our terms to continue') }}
                        </flux:subheading>
                    </div>
                </div>
            </div>

            <!-- Scrollable Content -->
            <div class="flex-1 overflow-y-auto p-6 space-y-5">
                <!-- Terms Content -->
                <div
                    class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-800/50 max-h-64 overflow-y-auto"
                >
                    <div class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('1. Acceptance of Terms') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('By accessing or using TradeHive\'s services, you agree to be bound by these Terms of Service, our Privacy Policy, and any additional posted guidelines. We may update these Terms at any time, and continued use constitutes acceptance.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('2. Eligibility') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('You must be at least 18 years old to use our Services. You agree to provide accurate registration information and maintain account security.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('3. Professional Trader Certification') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('By using TradeHive, you certify you are not a professional trader, are using the services for personal trading only, and do not trade for institutions or receive compensation for managing others\' trades. If your status changes, you must notify us immediately.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('4. Subscription & Billing') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('All purchases are final. Subscriptions auto-renew unless canceled at least 24 hours before renewal. Free trials convert to paid subscriptions unless canceled. Only one trial period is allowed every 6 months.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('5. Permitted Use') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('TradeHive grants you a limited license for personal use only. You may not copy, distribute, automate, scrape, resell, or redistribute our services or data. Account sharing is strictly prohibited; violations may result in suspension without refund.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('6. Prohibited Conduct') }}
                            </flux:heading>
                            <flux:text class="mt-1 mb-2 text-zinc-600 dark:text-zinc-400">
                                {{ __('You may not:') }}
                            </flux:text>
                            <ul class="ml-4 space-y-1 text-sm text-zinc-600 dark:text-zinc-400">
                                <li class="flex items-start gap-2">
                                    <span
                                        class="mt-1.5 size-1.5 rounded-full bg-zinc-400 dark:bg-zinc-500 shrink-0"
                                    ></span>
                                    {{ __('Use the Services for unlawful or fraudulent purposes') }}
                                </li>
                                <li class="flex items-start gap-2">
                                    <span
                                        class="mt-1.5 size-1.5 rounded-full bg-zinc-400 dark:bg-zinc-500 shrink-0"
                                    ></span>
                                    {{ __('Manipulate markets or violate securities laws') }}
                                </li>
                                <li class="flex items-start gap-2">
                                    <span
                                        class="mt-1.5 size-1.5 rounded-full bg-zinc-400 dark:bg-zinc-500 shrink-0"
                                    ></span>
                                    {{ __('Harass or abuse other users') }}
                                </li>
                                <li class="flex items-start gap-2">
                                    <span
                                        class="mt-1.5 size-1.5 rounded-full bg-zinc-400 dark:bg-zinc-500 shrink-0"
                                    ></span>
                                    {{ __('Promote competing services within our platform') }}
                                </li>
                            </ul>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('7. Market Data Disclaimer') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('TradeHive is not a registered investment adviser. All AI-generated insights are for educational purposes only. You are solely responsible for all trading decisions.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('8. Third-Party Services') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('We may integrate with brokers, data vendors, and APIs. We are not responsible for errors, delays, or outages caused by third parties.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('9. Service Availability') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('The Services are provided "as is" and "as available." We do not guarantee uninterrupted operation.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('10. Intellectual Property') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('All content, features, software, and trademarks on TradeHive are owned by us or our licensors. Unauthorized use is prohibited.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('11. Privacy & Data') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('We process data according to our Privacy Policy and applicable laws, including GDPR and CCPA.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('12. Limitation of Liability') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('We are not liable for indirect or consequential damages. Our total liability is limited to $1,000 or the fees paid in the last 12 months.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('13. Indemnification') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('You agree to indemnify and hold TradeHive harmless from any claims, damages, or expenses arising from your use of the Services or violation of these Terms.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('14. Termination') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('We may suspend or terminate accounts for Terms violations, fraudulent activity, or payment failures, without refund.') }}
                            </flux:text>
                        </div>
                        <div class="p-4">
                            <flux:heading size="sm" class="text-zinc-900 dark:text-zinc-100">
                                {{ __('15. Governing Law') }}
                            </flux:heading>
                            <flux:text class="mt-1 text-zinc-600 dark:text-zinc-400">
                                {{ __('These Terms are governed by New York law. Disputes will be resolved through binding arbitration.') }}
                            </flux:text>
                        </div>
                    </div>
                </div>

                <!-- Acknowledgements -->
                <div
                    class="rounded-xl border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 p-4 space-y-4"
                >
                    <flux:heading size="sm" class="text-zinc-700 dark:text-zinc-300">
                        {{ __('Please confirm the following:') }}
                    </flux:heading>
                    <div class="space-y-3">
                        <flux:checkbox
                            wire:model.live="tosAccepted"
                            :label="__('I have read and agree to the Terms of Service and Privacy Policy')"
                        />
                        <flux:checkbox
                            wire:model.live="is18Plus"
                            :label="__('I confirm that I am 18 years or older')"
                        />
                        <flux:checkbox
                            wire:model.live="isProfessionalTrader"
                            :label="__('I confirm that I am not a professional trader and understand account sharing is prohibited')"
                        />
                    </div>
                </div>

                <!-- Warning Callout -->
                <flux:callout variant="warning" icon="exclamation-triangle" class="rounded-xl">
                    <flux:callout.heading>{{ __('Important Risk Disclosure') }}</flux:callout.heading>
                    <flux:callout.text>
                        {{ __('Trading involves substantial risk of loss. TradeHive is NOT a registered investment adviser. Services are provided "as is" without guarantees.') }}
                    </flux:callout.text>
                </flux:callout>
            </div>

            <!-- Footer -->
            <div
                class="shrink-0 border-t border-zinc-200 dark:border-zinc-800 px-6 py-4 bg-zinc-50 dark:bg-zinc-800/50 rounded-b-2xl"
            >
                <div class="flex flex-col-reverse sm:flex-row sm:justify-end gap-3">
                    <flux:button wire:click="declineTerms" variant="filled">
                        {{ __('Decline') }}
                    </flux:button>
                    <flux:button
                        wire:click="acceptTerms"
                        variant="primary"
                        icon:trailing="arrow-right"
                        :disabled="! $this->canAcceptTerms"
                    >
                        {{ __('Agree & Continue') }}
                    </flux:button>
                </div>
            </div>
        </div>
    </flux:modal>
</div>
