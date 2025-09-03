<div class="steps">
    <div class="step {{ request()->routeIs('cart.*') || request()->routeIs('order.*') || request()->routeIs('payment.*') ? 'active' : '' }}">
        1. Cart
    </div>
    <div class="step {{ request()->routeIs('order.*') || request()->routeIs('payment.*') ? 'active' : '' }}">
        2. Order Info
    </div>
    <div class="step {{ request()->routeIs('payment.*') ? 'active' : '' }}">
        3. Payment
    </div>
</div>
