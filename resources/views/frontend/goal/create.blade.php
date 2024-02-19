@extends('layouts.index')

@section('content')
<section class="freelance_section layout_padding">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5 offset-md-1">
          <div class="detail-box">
            <div class="heading_container">
              <h2 class="mb-1">
                Set Your Goals
              </h2>
            </div>
            <form id="goalForm">
              <div class="form-group">
                <label for="goalInput mb-3">Goal:</label>
                <input type="text" class="form-control mb-3" id="goalInput" placeholder="Enter your goal" required>
              </div>
              <div class="form-group">
                <label for="actionInput mb-3">Action Steps:</label>
                <textarea class="form-control mb-1" id="actionInput" rows="3" placeholder="Enter action steps to achieve your goal" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary mt-3">Submit Goal</button>
            </form>
          </div>
        </div>
        <div class="col-md-6">
          <div id="goalDisplay"></div>
        </div>
      </div>
    </div>
  </section>
@endsection

@push('scripts')

<script>
    document.addEventListener("DOMContentLoaded", function () {
      const goalForm = document.getElementById("goalForm");
      const goalDisplay = document.getElementById("goalDisplay");

      goalForm.addEventListener("submit", function (event) {
        event.preventDefault();

        // Get user input values
        const goalInputValue = document.getElementById("goalInput").value;
        const actionInputValue = document.getElementById("actionInput").value;

        // Display the entered goal and action
        const goalDisplayItem = document.createElement("div");
        goalDisplayItem.innerHTML = `<strong>Goal:</strong> ${goalInputValue}<br><strong>Action Steps:</strong> ${actionInputValue}
          <button class="btn btn-success btn-sm" onclick="clearGoal(this)">Done</button><hr>`;
        goalDisplay.appendChild(goalDisplayItem);

        // Clear the form
        goalForm.reset();
      });

      // Function to clear a goal
      window.clearGoal = function (button) {
        const goalItem = button.parentNode;
        goalDisplay.removeChild(goalItem);
      };
    });
  </script>

@endpush