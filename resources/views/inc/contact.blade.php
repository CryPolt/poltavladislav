<!-- ======= Contact Me Section ======= -->

@extends('layouts.opp')
<section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <span>Contact Me</span>
        <h2>Contact Me</h2>
        <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit alias</p>
      </div>

      <div class="row">

        <div class="col-lg-6">

          <div class="row">
            <div class="col-md-12">
              <div class="info-box">
                <i class="bx bx-share-alt"></i>
                <h3>Social Profiles</h3>
                <div class="social-links">
                  <a href="https://vk.com/poltavskiyvladislav" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="https://www.instagram.com/crypolt/" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-envelope"></i>
                <h3>Email Me</h3>
                <p>contact@example.com</p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="info-box mt-4">
                <i class="bx bx-phone-call"></i>
                <h3>Call Me</h3>
                <p>+1 5589 55488 55</p>
              </div>
            </div>
          </div>

        </div>



        <div class="col-lg-6">
            <!-- Success message -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            <div class="col-lg-6">
            <form class="php-email-form" class="" method="pacth" action="{{ route('contact.store') }}">
                <div class="row ">
                <!-- CROSS Site Request Forgery Protection -->
                @csrf
                <div class="col-md-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group mt-3">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group mt-3">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="form-group mt-3">
                    <label>Message</label>
                    <textarea class="form-control" name="message" id="message" rows="6"></textarea>
                </div>
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block ">
                </div>
            </form>
            </div>

        </div>

      </div>

    </div>
  </section><!-- End Contact Me Section -->
