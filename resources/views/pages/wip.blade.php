@extends('layouts.default')

@section('content')
<div>

    <h2>Work in progress</h2>

    <article>
        <h3>Must haves</h3>
        <ul>
            <li class="done">Setup Laravel</li>
            <li class="done">Create initial repository and dev branch</li>
            <li class="done">Learn Laravel</li>
            <li class="done">Create hello world views</li>
            <li class="done">Update routes</li>
            <li class="done">Create SIMPLE stylesheet</li>
            <li class="done">Create create tables migration</li>
            <li class="done">Create data model</li>
            <li class="done">Dev the data fetch script (Applicable For, Value, Area)</li>
            <li class="done">Debug the data fetch script in a temp view</li>
            <li class="done">Create fetch data migration</li>
            <li class="done">Run and debug migration</li>
            <li class="done">Create data view</li>
            <li class="done">Debug data view</li>
            <li class="todo">Update repository</li>
        </ul>
    </article>

    <article>
        <h3>Additional functionality</h3>
        <ul>
            <li class="todo">Data filtering</li>
            <li class="todo">Average calorific value for a period</li>
            <li class="todo">Update data via front-end</li>
            <li class="todo">Implement graphs / charts</li>
            <li class="todo">Pretty stylesheet</li>
        </ul>
    </article>

    <article>
        <h3>Debug box</h3>
        <div>
            <p>PHP Version = [<?php echo phpversion(); ?>]</p>
        </div>
    </article>

</div>
@endsection
