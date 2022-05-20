@extends('layouts.default')

@section('content')

<div>
    <h2>Index page</h2>
    <div>
        <table>
            <thead>
                <tr>
                    <td>Applicable For</td>
                    <td>Area</td>
                    <td>Value</td>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($data as $item) {
                        echo '<tr>';
                        echo    '<td>' . $item->applicable_for . '</td>';
                        echo    '<td>' . $item->name . '</td>';
                        echo    '<td>' . $item->value . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

@endsection
