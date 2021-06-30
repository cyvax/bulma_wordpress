<div class="navbar-item field">
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <div class="field has-addons">
            <div class="control control_input">
                <label>
                    <input class="input" type="text" id="s" name="s" placeholder="<?php echo esc_attr_x('Search…', 'placeholder'); ?>">
                </label>
            </div>
            <div class="control">
                <button type="submit" class="button is-primary">Search</button>
            </div>
        </div>
    </form>
</div>
