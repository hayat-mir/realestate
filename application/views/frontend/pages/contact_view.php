<!-- <?php
      // print_r($this->session->userdata());
      ?> -->
<!-- Flash data Success -->
<?php if ($this->session->flashdata('success') != null) { ?>
  <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    <strong><?php echo $this->session->flashdata('success'); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>
<!-- Flash data Failure -->
<?php if ($this->session->flashdata('failure') != null) { ?>
  <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <strong><?php echo $this->session->flashdata('failure'); ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php } ?>
<div class="card_contact">
  <img src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80" alt="image" class="image_contact" />
  <div class="head_text_contact">Contact Us</div>
</div>
<div class="container">
  <div class="wrapper-left">
    <div class="row mt-5 mb-3 text-info text-center">
      <div class="col-md-12">
        <h3 class="card-title ">Contact Us</h3>
        <input type="hidden" id="unique_id" value="<?php echo $this->session->userdata('user_id'); ?>" />
      </div>
    </div>
    <form method="post" action="<?php echo base_url() ?>index.php/message?id=<?php echo 'contact_us' ?>">
      <div class="row">
        <div class="form-group col-md-6">
          <label for="FirstName">UserName</label><small class="req text-danger"> *</small>
          <input type="text" name="username" class="form-control" id="" value="<?php echo $this->session->userdata('fullname'); ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="LastName">Address</label><small class="req text-danger"> *</small>
          <input type="text" name="address" class="form-control" id="inputPassword4" value="<?php echo $this->session->userdata('address'); ?>" required>
        </div>
      </div>
      <div class=" row ">
        <div class=" form-group col-md-6">
          <label for="inputPhone">PhoneNo</label><small class="req text-danger"> *</small>
          <input type="text" name="phone" class="form-control" id="inputEmail4" value="<?php echo $this->session->userdata('mobile'); ?>" required>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label><small class="req text-danger"> *</small>
          <input type="email" name="email" class="form-control" value="<?php echo $this->session->userdata('email'); ?>" required>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-12">
          <label for="inputSubject">Subject</label><small class="req text-danger"> *</small>
          <input type="text" name="subject" class="form-control" placeholder="Enter your subject" required>
        </div>
      </div>
      <div class="row ">
        <div class="form-group col-md-12">
          <label for="inputMessage">Message</label><small class="req text-danger"> *</small>
          <textarea class="form-control" name="user_query" required>
          Enter your query.......!!!!
    </textarea>
        </div>
      </div>
      <div class="row ">
        <div class="form-group mb-5 col-md-12">
          <button type="submit" id="check_login_user" class="btn btn-primary btn-block">Request Information</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript">
  $("document").ready(function() {
    $('#check_login_user').click(function(e) {
      var user_id = $("#unique_id").val();
      if (user_id == '') {
        alert("please register first");
        e.preventDefault();
        return false;
      }
    })
  })
</script>
<!-- </body>
</html> -->