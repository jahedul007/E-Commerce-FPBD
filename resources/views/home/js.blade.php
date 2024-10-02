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
