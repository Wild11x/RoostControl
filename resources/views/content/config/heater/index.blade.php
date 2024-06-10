@extends('layout.admin')

@section('title', 'Config Heater | RoostControl')


@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h5 class="card-title fw-semibold mb-4">Manage Users</h5>
                <div>
                    <input type="radio" id="manual" name="mode" value="manual">
                    <label for="manual">Manual</label>
                </div>
                <div>
                    <input type="radio" id="auto" name="mode" value="auto">
                    <label for="auto">Otomatis</label>
                </div>

                <div id="manual-mode">
                    <h3>Manual Mode</h3>
                    <label for="switch">Switch:</label>
                    <input type="checkbox" id="switch" name="switch">
                </div>

                <div id="auto-mode">
                    <h3>Otomatis Mode</h3>
                    <label for="max_temp">Max Temperature:</label>
                    <input type="number" id="max_temp" name="max_temp">
                    <br>
                    <label for="min_temp">Min Temperature:</label>
                    <input type="number" id="min_temp" name="min_temp">
                    <br>
                    <label for="max_temp_range">Max Temperature Range:</label>
                    <input type="range" id="max_temp_range" name="max_temp_range" min="0" max="100">
                    <br>
                    <label for="min_temp_range">Min Temperature Range:</label>
                    <input type="range" id="min_temp_range" name="min_temp_range" min="0" max="100">
                </div>
                </form>

                // Add JavaScript code to toggle the manual and auto mode sections
                <script>
                    $(document).ready(function() {
                        $('input[name="mode"]').on('change', function() {
                            if ($(this).val() == 'manual') {
                                $('#manual-mode').show();
                                $('#auto-mode').hide();
                            } else {
                                $('#manual-mode').hide();
                                $('#auto-mode').show();
                            }
                        });
                    });
                </script>

                @endsection
