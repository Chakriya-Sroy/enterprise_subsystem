@extends('layouts.index')
@section('content')
    <section>
        <div class="container">
            <div class="form-group mt-5">
                <input type="text" name="search" id="search" class="form-control" placeholder="Search Journal" oninput="search()">
            </div>
            <div class="mt-5">
                <h1>Journal</h1>
                <div id="journals-container" class="row ">
                    @foreach ($journals as $journal )
                    <div class="journal mt-3 rounded p-3 col-lg-12 col-md-12 col-sm-12">
                        <p>{{ $journal['EntryText'] }}</p>
                     </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
  function search() {
        var searchValue = document.getElementById('search').value.toLowerCase();
        var journalElements = document.querySelectorAll('.journal');

        journalElements.forEach(function (journalElement) {
            var journalText = journalElement.textContent.toLowerCase();

            if (journalText.includes(searchValue)) {
                journalElement.style.display = 'block';
            } else {
                journalElement.style.display = 'none';
            }
        });
    }
    </script>
@endpush