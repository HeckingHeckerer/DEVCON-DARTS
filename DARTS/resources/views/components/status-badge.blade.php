@props(['status'])

@php
    $value = strtolower(str_replace(['-', ' '], '_', (string) $status));

    $classes = match ($value) {
        'active', 'verified', 'approved', 'paid', 'released', 'ready_for_pickup', 'ready_for_claim', 'completed', 'success' =>
            'border-emerald-200 bg-emerald-50 text-emerald-700',
        'pending', 'pending_verification', 'submitted', 'under_review', 'for_payment', 'for_printing', 'for_assessment', 'info' =>
            'border-amber-200 bg-amber-50 text-amber-700',
        'needs_correction', 'needs_additional_documents', 'warning', 'referred' =>
            'border-orange-200 bg-orange-50 text-orange-700',
        'rejected', 'cancelled', 'suspended', 'deactivated', 'void', 'inactive' =>
            'border-rose-200 bg-rose-50 text-rose-700',
        default =>
            'border-slate-200 bg-slate-50 text-slate-700',
    };

    $label = str($status)->replace('_', ' ')->title();
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center rounded-full border px-3 py-1 text-xs font-semibold $classes"]) }}>
    {{ $label }}
</span>
