<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>


@include('front.includes.menu')
<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" name="search" value="{{ request('search') }}"
                   id="search-input" placeholder="Search product here.....">
        </form>
    </div>
</div>
<!-- Search End -->
