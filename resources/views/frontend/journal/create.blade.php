@extends('layouts.index')

@push('styles')
<style>
    .emotion-btn {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        padding: 0;
        text-align: center;
        line-height: 80px;
        font-size: 14px;
        margin-right: 20px;
    }

    .active-tab {
        background-color: #f8d7da;
        border-color: #f5c6cb;
        color: #721c24;
    }

    .text-area-container {
        padding: 20px;
        border: none;
        margin-top: 20px;
    }

    .done-btn {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 20px;
    }

    .done-btn:hover {
        background-color: #218838;
    }

    .selected {
        background-color: #007bff;
        color: white;
    }

    #journal-entry {
        border-radius: 25px;
    }
</style>
@endpush
@section('content')
<div class="container mt-4">
    <!-- Emotion Selection -->

    <div class="emotion-selection d-flex align-items-center">
        <p class="mr-3 mb-0">Select your emotion:</p>
        <div class="ms-3 d-flex flex-row">
            <button type="button" class="btn btn-outline-secondary emotion-btn">Happy</button>
            <button type="button" class="btn btn-outline-secondary emotion-btn">Sad</button>
            <button type="button" class="btn btn-outline-secondary emotion-btn">Stress</button>
            <button type="button" class="btn btn-outline-secondary emotion-btn">Excited</button>
            <button type="button" class="btn btn-outline-secondary emotion-btn">Reflective</button>
        </div>
    </div>

    <!-- Textarea for new entry -->
    <div class="text-area-container">
        <textarea class="form-control" id="journal-entry" rows="6" placeholder="What happened today?"></textarea>
    </div>
    <!-- Done Button -->
    <div class="text-center">
        <button type="button" class="done-btn">Done</button>
    </div>
</div>

@endsection

@push('scripts')
<script>
    var mood ="";
    $(document).ready(function () {
        $('.emotion-btn').on('click', function () {
            $('.emotion-btn').removeClass('selected');
            $(this).addClass('selected');
            mood =$(this).text();
        });
        $('.done-btn').on('click',function(){
            var content =$('#journal-entry').val().trim();
            // check if the mood is click
            if (mood === "") {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please select a mood",
                });
            }
            // check if the content is null
            if (content === "") {
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please enter a description before clicking 'Done'.",
                });
            }
            
            $.ajax({
                url: '{!! asset("journal.json") !!}', // Replace with your API endpoint
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    mood: mood,
                    content: content
                }),
                success: function(response) {
                    console.log("API response:", response);
                    // Optionally, handle the response here
                },
                error: function(error) {
                    console.error('Error posting data to API:', error);
                }
            });
            //Post Request to API database

            // Set the text area box to null
            $('#journal-entry').val("");
            // Remove selected class from emotion buttons
            $('.emotion-btn').removeClass('selected');
        })
       
    });
</script>
@endpush