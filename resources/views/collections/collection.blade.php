@extends('layouts.admin')
<style>
    .table td, .table th{
        border-top: 1px solid #f1f1f1;
    border-bottom: 1px solid #f1f1f1;
    white-space: nowrap;
    padding: 0.7rem 0.75rem;
    font-size: 14px;
    }
    .badge-info {
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #000;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: aqua;
    font-size: 13px;
    }
    .badge-warning {
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #000;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: yellow;
    font-size: 13px;
    }
    .badge-default{
    display: inline-block;
    padding: 0.35em 0.5em;
    font-size: 0.75em;
    font-weight: 500;
    line-height: 1;
    color: #ffffff;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 7px;
    background-color: orangered;
    font-size: 13px;
    }

    </style>
@section('title', __())

@section('breadcrumb')
    <ul class="breadcrumb">
        <!-- Breadcrumb code here -->
    </ul>
    @endsection

@section('content')
<div>
<div class="row">
        <div class="section-body">
            <div class="col-md-12 m-auto">
                <div class="card rounded-card-10px">
                    <div class="card-header">
                        <h5> {{ __('Collection Video') }}</h5>
                    </div>
{{ Form::model($data, ['route' => 'collections.collection', 'method' => 'POST','id'=>'savecollectionForm']) }}
<div class="card-body">
    <div class="table_respo_cls">
        <div class="table-responsive">
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">SHOW DETAILS</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody style="background-color: #fff;">
                    @php $index = 1; @endphp
                    <!-- <pre>{{print_r($data)}}</pre> -->
                    @foreach ($data as $type => $items)
                        <tr>
                            <td>{{ $index++ }}</td>
                            <td>{{ $type }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-success btn-md" onclick="showHide('{{ strtolower(str_replace(' ', '_', $type)) }}')">Show Details</button>
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr style="background-color: #fdfdfd;display:none" id="showDetail_{{ strtolower(str_replace(' ', '_', $type)) }}">
                            <td colspan="4">
                                <div class="table_respo_cls">
                                    <div class="table-responsive">
                                        <table class="table" border="1">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">TOPIC</th>
                                                    <!-- <th scope="col">TAGS</th> -->
                                                    <th scope="col">Link</th>
                                                    <th scope="col">Check</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($items as $row)
                                                <!-- <pre>{{print_r($row->name_english)}}</pre> -->
                                                    <tr>
                                                        <td>{{ $row->id }}</td>
                                                        <!-- <td>{{ $row->topic_english }}</td> -->
                                                        <td>{{ $row->topic_english ? $row->topic_english : $row->name_english }}</td>

                                                        <!-- <td>
                                                            <?php
                                                                $tagsIdsArray = explode(',', $row->tag_id);
                                                                if ($tagsIdsArray === null) {
                                                                    $tagsIdsArray = [];
                                                                }
                                                            ?>
                                                            @php $tagCount = 0; @endphp
                                                            @foreach ($preferences as $preference)
                                                                @if (in_array($preference->id, $tagsIdsArray))
                                                                    @if ($tagCount < 3)
                                                                        {{ $preference->preferences_name }}
                                                                        @php $tagCount++; @endphp
                                                                        @if ($tagCount < 3 && !$loop->last), @endif
                                                                    @else
                                                                        ...
                                                                        @break
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        </td> -->
                                                        <td>{{ strlen($row->link) > 50 ? substr($row->link, 0, 50) . '...' : $row->link }}</td>
                                                        <td>
                                                            @php
                                                                $typeId = $typeMap[$type];
                                                                $checkboxDisplayValue = "{$type}_" . $row->id; // Display value
                                                                $checkboxStoredValue = "{$typeId}_{$row->id}"; // Stored value
                                                                $isChecked = in_array($checkboxStoredValue, $storedCheckboxValues);
                                                            @endphp
                                                            <input type="checkbox" onclick="return validateform1()" name="link_id[]" value="{{ $checkboxStoredValue }}" {{ $isChecked ? 'checked' : '' }}>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<div class="card-footer" style="padding: 10px 0px !important;">
    <div class="d-flex align-items-center justify-content-end gap-2 px-3">
        <a href="{{ route('collections.collection') }}" class="btn btn-secondary mb-0" style="display: none;">{{ __('Cancel') }}</a>
        <button type="submit" onclick="return validateform2()" class="btn btn-primary mb-0" style="display: none;">{{ __('Save') }}</button>
    </div>
</div>
{!! Form::close() !!}
</div>
            </div>
        </div>
    </div>

<script>
    function showHide(type) {
        var showDetail = 'showDetail_' + type;
        const myElement = document.getElementById(showDetail);
        const displayValue = window.getComputedStyle(myElement).display;

        if (displayValue == 'none') {
            document.getElementById(showDetail).style.display = '';
            event.target.innerText = 'Hide Details';
            document.querySelector('.card-footer .btn-secondary').style.display = 'inline-block';
            document.querySelector('.card-footer .btn-primary').style.display = 'inline-block';
        } else {
            document.getElementById(showDetail).style.display = 'none';
            event.target.innerText = 'Show Details';
            // Hide the Cancel and Save buttons
        document.querySelector('.card-footer .btn-secondary').style.display = 'none';
        document.querySelector('.card-footer .btn-primary').style.display = 'none';
        }
    }
    function validateform1() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
    if (checkboxes.length > 5) {
        alert('You can not selected more then five collection for showing on home.');
        return false;
    }
    return true;
}
</script>
<script>
  function validateform2() {
    var error = 0;

    const formElement = document.getElementById('savecollectionForm');
    const formElements = formElement.querySelectorAll('input, select, textarea');
    const excludedIds = ['thumbnail']; // IDs to exclude from validation

    formElements.forEach(element => {
        const id = element.id;
        if (!id.startsWith('note-dialog')) {
            const value = element.value;
            if ((value == "" || value == 0) && id != "" && !excludedIds.includes(element.id)) {
                var Label = document.querySelector("label[for='"+id+"']");
                Label.style.color = 'red';
                var invalidField = document.getElementById(id);
                // invalidField.focus();
                invalidField.style.border = '1px solid red';
                error = 1;
            }
        }
    });
    if (error == 1) {
        alert('Please fill out all required fields.');
        return false;
    } else {
        var confirmMessage = "Do you want to save changes?";
        if (confirm(confirmMessage)) {
            // User wants to save, you can proceed with submission or other actions
            return true;
        } else {
            // User doesn't want to save, prevent form submission
            return false;
        }
    }
}
</script>
@endsection
