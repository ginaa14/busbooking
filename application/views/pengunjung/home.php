<section id="bg-bus" class="d-flex align-items-center">
    <div class="container">
      <?php if(!isset($_SESSION['login_id'])): ?>
      	<center>
          <a href="<?= base_url().'Pengunjung/Booking/index'; ?>" class="btn btn-info btn-lg" type="button" id="book_now">Book Now</a>
        </center>
      <?php else: ?>
        <h2>Welcome</h2>
      <?php endif; ?>
    </div>
</section>