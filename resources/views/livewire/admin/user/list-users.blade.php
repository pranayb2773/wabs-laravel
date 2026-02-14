<div>
    <div class="flex flex-col gap-4">
        <!-- Breadcrumbs -->
        <flux:breadcrumbs>
            <flux:breadcrumbs.item href="{{ route('admin.dashboard') }}">
                {{ __('Home') }}
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>{{ __('Users') }}</flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <!-- Page Heading -->
        <div class="flex items-center justify-between">
            <flux:heading size="xl">{{ __('Users') }}</flux:heading>
        </div>

        <!-- Filters and Table -->
        <div x-data="checkAll">
            @include('partials.admin.user.filters')
            @include('partials.admin.user.table')
        </div>
    </div>
</div>

@script
    <script>
        Alpine.data('checkAll', () => {
            return {
                init() {
                    this.$wire.$watch('selectedUserIds', () => {
                        this.updateCheckAllState();
                    });

                    this.$wire.$watch('userIdsOnPage', () => {
                        this.updateCheckAllState();
                    });

                    this.$wire.$watch('userIds', (newDocuments) => {
                        if (!newDocuments.length) {
                            this.$refs.checkbox.checked = false; // Remove checked
                            this.$refs.checkbox.indeterminate = false;
                        }
                    });
                },

                updateCheckAllState() {
                    if (this.pageIsSelected()) {
                        // If the page is fully selected
                        this.$refs.checkbox.checked = true; // Set checked
                        this.$refs.checkbox.indeterminate = false;
                    } else if (this.pageIsEmpty()) {
                        // If the page is empty
                        this.$refs.checkbox.checked = false; // Remove checked
                        this.$refs.checkbox.indeterminate = false;
                    } else {
                        // If the page is partially selected (indeterminate state)
                        this.$refs.checkbox.checked = false;
                        this.$refs.checkbox.indeterminate = true;
                    }
                },

                pageIsSelected() {
                    return this.$wire.userIdsOnPage.every((id) => this.$wire.selectedUserIds.includes(id));
                },

                pageIsEmpty() {
                    return this.$wire.selectedUserIds.length === 0;
                },

                handleCheck(e) {
                    e.target.hasAttribute('data-checked') ? this.selectAllOnPage() : this.deselectAllOnPage();
                },

                selectAllOnPage() {
                    this.$wire.userIdsOnPage.forEach((id) => {
                        if (this.$wire.selectedUserIds.includes(id)) return;

                        this.$wire.selectedUserIds.push(id);
                    });

                    console.log('userIds', this.$wire.userIds);
                    console.log('selectedUserIds', this.$wire.selectedUserIds);
                },

                selectAll() {
                    this.$wire.selectedUserIds = this.$wire.userIds;
                },

                deselectAllOnPage() {
                    const idsOnPage = new Set(this.$wire.userIdsOnPage);
                    this.$wire.selectedUserIds = this.$wire.selectedUserIds.filter((id) => !idsOnPage.has(id));
                },

                deselectAll() {
                    this.$wire.selectedUserIds = [];
                },
            };
        });
    </script>
@endscript
