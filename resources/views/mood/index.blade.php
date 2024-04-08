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
@section('title', __('Mood'))

@section('breadcrumb')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item">{{ __('Mood') }}
        </li>
    </ul>
@endsection

@section('content')

<div class="row">
    <div class="section-body">
        <div class="col-md-12 m-auto">
            <div class="card rounded-card-10px">
                <div class="card-header">
                    <h5> {{ __('Mood') }}</h5>
                </div>
                <div class="card-body my-1">
                    <div class="table_respo_cls">
                        <div class="table-responsive">
                            <table class="table" border="1">
                                @php $index = 1; @endphp

                                @foreach ($data as $type => $items)
                                @foreach ($items as $itemsVal)
                                @php
                                    $categoryName = $itemsVal['name'];
                                    $moodId = $itemsVal['id'];
                                @endphp
                                <!-- <pre>{{print_r($itemsVal->toArray())}}</pre> -->
                                <thead>
                                    <tr >
                                        <th scope="col">{{ $itemsVal['name'] }} ( {{$itemsVal['name_arabic']}} )</th>
                                        <th scope="col">
                                            Action
                                        </th>
                                    </tr>

                                </thead>


                                <tbody style="background-color: #fff;">
                                    <tr style="background-color: aliceblue;"><td colspan="2"> Category</td> </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-3" style="flex-wrap: wrap;" >
                                                @if(!empty($itemsVal['categories']))
                                                    @foreach ($itemsVal['categories'] as $categoryVal)
                                                        <div class="d-flex gap-1">
                                                        <span class="badge badge-primary">{{ $categoryVal->name }} ({{ $categoryVal->name_arabic}})</span>


                                                        <a href="javascript:void(0)" class="text-white bg-danger rounded-circle d-inline-flex align-items-center justify-content-center p-2" style="width: 22px; height: 22px;"  onclick="deleteModalForCategory('{{$categoryVal->name}}','{{$categoryVal->id}}','moodcategory')">
                                                            <span>x</span>
                                                        </a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td>


                                        <button type="button" class="btn btn-primary" onclick="openModalForCategory('{{$categoryName}}','{{$moodId}}')">Add Category</button>


                                        </td>
                                    </tr>
                                    <tr style="background-color: aliceblue;"><td colspan="2">Sub Category</td></tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex gap-3" style="flex-wrap: wrap;">
                                                @if(!empty($itemsVal->toArray()['mood_sub_categories']))
                                                    @foreach ($itemsVal->toArray()['mood_sub_categories'] as $subcategoryVal)
                                                    @php
                                                        $subCatName = $subcategoryVal['name'];
                                                        $subCatId = $subcategoryVal['id'];
                                                    @endphp
                                                    <div class="d-flex gap-1">
                                                    <span class="badge badge-primary">{{$subcategoryVal['name']}} ({{ $subcategoryVal['name_arabic']}})</span>

                                                    <a href="javascript:void(0)" class="text-white bg-danger rounded-circle d-inline-flex align-items-center justify-content-center p-2" style="width: 22px; height: 22px;"  onclick="deleteModalForCategory('{{$subCatName}}','{{$subCatId}}','moodsubcategory')">
                                                            <span>x</span>
                                                        </a>
                                                    </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </td>
                                        <td><button type="button" class="btn btn-primary" onclick="openModalForSubCategory('{{$categoryName}}','{{$moodId}}')">Add Sub-Category</button> </td>
                                    </tr>
                                    </tbody>


                                @endforeach
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
        <!-- Modal for ADD   -->

        <div class="modal fade" id="moodCategory" tabindex="-1" role="dialog" aria-labelledby="MoodCategory" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="MoodCategory"></h5>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> -->
                    </div>
                    {{ Form::open(['route' => 'mood.store', 'method' => 'POST', 'id' => 'saveMoodCategoryForm']) }}
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                            <input type="hidden" name="moodtype" value="moodcategory" id="moodtype">
                            <input type="hidden" name="moodId" value="" id="moodId">
                        </div>
                        <div class="form-group">
                            <label for="name_arabic">Arabic Name</label>
                            <input type="text" class="form-control" name="name_arabic" id="name_arabic"
                                placeholder="Enter Arabic Name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="modelcloseadd();">Close</button>
                        <button type="submit" onclick="return validateform1();" class="btn btn-primary">Save</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

      <!---------------------------------- End Update Model ----------------------------->


        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel"></h5>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete ?
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="delMoodtype" value="" id="delMoodtype">
                            <input type="hidden" name="categoryId" value="" id="categoryId">
                            <button type="button" class="btn btn-secondary"  onclick="modelclose();">Cancel</button>
                            <button type="submit" class="btn btn-danger" onclick="deletemoods();">Delete</button>
                        </div>
                    </div>
                </div>
            </div>


<script>
    // Function to open the modal with a dynamic title
    function openModalForCategory(title,moodId) {
        // Set the title of the modal
        // alert(title);
        $('#moodCategory .modal-title').text('Mood Category ( ' + title +' )');
        document.getElementById('moodtype').value = 'moodcategory';
        document.getElementById('moodId').value = moodId;
        // Show the modal
        $('#moodCategory').modal('show');
    }

    function openModalForSubCategory(title,moodId) {
        // Set the title of the modal
        // alert(title);
        $('#moodCategory .modal-title').text('Mood Sub Category ( ' + title +' )');
        document.getElementById('moodtype').value = 'moodsubcategory';
        document.getElementById('moodId').value = moodId;
        // Show the modal
        $('#moodCategory').modal('show');
    }



    function deleteModalForCategory(title,categoryId,delMoodtype) {
        // alert(moodtype);
        $('#deleteModal .modal-title').text('Delete Confirmation ( ' + title +' )');
        document.getElementById('delMoodtype').value = delMoodtype;
        document.getElementById('categoryId').value = categoryId;
        $('#deleteModal').modal('show');
    }

    function deletemoods() {

            var moodtype = document.getElementById('delMoodtype').value;
            var categoryId = document.getElementById('categoryId').value;

            $.ajax({
                url: '/insijam_backend/mood/' + categoryId,
                type: 'DELETE',
                data: {
                    'moodtype' : moodtype,
                    'categotyId':categoryId,
                    _token: '{{ csrf_token() }}',
                },
                success: function (response) {
                    // Handle success, e.g., remove the item from the DOM
                    console.log(response);
                    if(response==true){
                        alert('Category Deleted Successfully.');
                    }
                    location.reload();
                },
                error: function (xhr) {
                    // Handle error
                    console.log(xhr.responseText);
                }
            });
        }

        function modelclose(){
            $('#deleteModal').modal('hide');

        }

        function modelcloseadd(){
            $('#moodCategory').modal('hide');

        }


</script>



<script>
  function validateform1() {
    var error = 0;
    const formElement = document.getElementById('saveMoodCategoryForm');
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
        var confirmMessage = "Do you want to save";
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
<script>
function validateform2() {
    var error = 0;

    const formElement = document.getElementById('saveMoodSubCategoryForm');
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
        var confirmMessage = "Do you want to save";
        if (confirm(confirmMessage)) {
            // User wants to save, you can proceed with submission or other actions
            return true;
        } else {
            // User doesn't want to save, prevent form submission
            return false;
        }
    }
}


  // Function to open the modal and update its content
function openModal(title, name, nameArabic, id, type) {
    // alert(type)
    // Set modal title
    $("#updateMoodId").text(title);
    $("#idmoodtype").val(id);

    // Set input values
    $("#moodname").val(name);
    var currentValue = $("#editmoodtype").val(type);
    $("#moodname_arabic").val(nameArabic);
    $("#editmoodtype").val(type);
    //  console.log(currentValue); // Assuming you have an input with ID 'moodId' to store the ID

    // Open the modal
    $("#updateMood").modal("show");
}

function dismissModal() {
    $("#updateMood").modal("hide");
}

</script>
@endsection
