      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>

      {{-- product view js --}}

      <script src="home/js/viewProduct.js"></script>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>



    {{-- php artisan make:model Comment -m
      php artisan make:model Reply -m --}}


    {{-- Comment and Reply System end --}}

    <script type="text/javascript">
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();

        }
    </script>


{{-- Comment not scrolling code --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script> --}}



{{-- multiple product view --}}

<script>document.addEventListener('DOMContentLoaded', () => {
    const mainImg = document.querySelector('.main-img');
    const thumbnails = document.querySelectorAll('.thumb-img');

    thumbnails.forEach(thumb => {
      thumb.addEventListener('click', (e) => {
        // Get the src of the clicked thumbnail
        const src = e.target.src;

        // Update the main image src
        mainImg.src = src;

        // Update active thumbnail
        thumbnails.forEach(t => t.classList.remove('active-thumb'));
        e.currentTarget.classList.add('active-thumb');
      });
    });
  });
  </script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // Listen for changes in the District dropdown
        $('#district').on('change', function() {
            var district = $(this).val(); // Get selected district value
            if (district) {
                $.ajax({
                    url: '/get-thanas', // Route for getting the thanas
                    type: 'GET',
                    data: { district: district }, // Send the selected district
                    success: function(data) {
                        $('#thana').empty(); // Clear the thana dropdown
                        $('#thana').append('<option value="">Select your Thana</option>'); // Default option
                        $.each(data, function(index, value) {
                            $('#thana').append('<option value="' + value + '">' + value + '</option>'); // Populate thanas
                        });
                    },
                    error: function() {
                        console.error("There was an error fetching the thanas.");
                    }
                });
            } else {
                $('#thana').empty();
                $('#thana').append('<option value="">Select your Thana</option>'); // Reset if no district selected
            }
        });
    });
</script>



<script>
    document.getElementById('district').addEventListener('change', function() {
        const district = this.value;
        const deliveryChargeInput = document.getElementById('delivery_charge');

        // Check if the selected district is Dhaka
        if (district === 'Dhaka City') {
            deliveryChargeInput.value = 60; // Set delivery charge to 60 TK for Dhaka
        } else if (district) {
            deliveryChargeInput.value = 110; // Set delivery charge to 110 TK for other districts
        } else {
            deliveryChargeInput.value = 0; // Reset if no district is selected
        }
    });
</script>


<!-- drak mode  -->

<script>
    // Get the toggle button and the body element
    const toggleButton = document.getElementById('theme-toggle');
    const body = document.body;

    // Check if dark mode is already set in local storage
    if (localStorage.getItem('theme') === 'dark') {
      body.classList.add('dark-mode');
      toggleButton.textContent = 'Switch to Light Mode';
    }

    // Add click event listener to toggle dark mode
    toggleButton.addEventListener('click', () => {
      body.classList.toggle('dark-mode');

      // Update button text based on the current mode
      if (body.classList.contains('dark-mode')) {
        toggleButton.textContent = 'Switch to Light Mode';
        toggleButton.style = 'box-shadow: 0px 0px 1px rgb(222, 151, 255) inset,
      0px 0px 2px rgb(222, 151, 255) inset,
      0px 0px 10px rgb(222, 151, 255) inset,
      0px 0px 40px rgb(222, 151, 255),
      0px 0px 100px rgb(222, 151, 255),
      0px 0px 5px rgb(222, 151, 255);
  border: 2px solid rgb(255, 255, 255);
  background-color: rgb(152, 107, 172);
  color: rgb(255, 255, 255);'
        localStorage.setItem('theme', 'dark'); // Save preference in local storage
      } else {
        toggleButton.textContent = 'Switch to Dark Mode';
        localStorage.setItem('theme', 'light'); // Save preference in local storage
      }
    });
  </script>

  <script>
    document.getElementById('checkbox').addEventListener('change', function() {
    if (this.checked) {
        // Code for when the checkbox is checked (dark theme)
        document.body.style.backgroundColor = '#121212'; // Example of changing to dark theme
        document.body.style.color = '#ffffff'; // Text color for dark theme
    } else {
        // Code for when the checkbox is unchecked (light theme)
        document.body.style.backgroundColor = '#ffffff'; // Example of changing to light theme
        document.body.style.color = '#000000'; // Text color for light theme
    }
});

  </script>


<script>
    // Get the toggle button and checkbox
const toggleButton = document.getElementById('checkbox');

// Function to apply the theme based on localStorage
function applyTheme(theme) {
  if (theme === 'dark') {
    document.body.classList.add('dark-mode');
    document.body.classList.remove('light-mode');
    toggleButton.checked = true; // Reflect the dark mode on the toggle button
  } else {
    document.body.classList.add('light-mode');
    document.body.classList.remove('dark-mode');
    toggleButton.checked = false; // Reflect the light mode on the toggle button
  }
}

// Check the stored theme preference on page load
const storedTheme = localStorage.getItem('theme');
if (storedTheme) {
  applyTheme(storedTheme);
} else {
  // Default to light mode if no preference is saved
  applyTheme('light');
}

// Listen for changes on the toggle button
toggleButton.addEventListener('change', function () {
  if (this.checked) {
    // Dark mode is activated
    localStorage.setItem('theme', 'dark'); // Save preference in local storage
    applyTheme('dark');
  } else {
    // Light mode is activated
    localStorage.setItem('theme', 'light'); // Save preference in local storage
    applyTheme('light');
  }
});

</script>
