@extends('layouts.app')
<style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Raleway:300);
@import url(https://fonts.googleapis.com/css?family=Lusitana:400,700);
.align-center {
  text-align: center;
}

html {
  height: 100%;
}

body {
  height: 100%;
  position: relative;
}

.row {
  margin: -20px 0;
}
.row:after {
  content: "";
  display: table;
  clear: both;
}
.row .col {
  padding: 0 20px;
  float: left;
  box-sizing: border-box;
}
.row .col.x-50 {
  width: 50%;
}
.row .col.x-100 {
  width: 100%;
}

.content-wrapper {
  min-height: 100%;
  position: relative;
}

.get-in-touch {
  max-width: 650px;
  margin: 0 auto;
  position: relative;
  top: 50%;
  
}
.get-in-touch .title {
  text-align: center;
  font-family: Raleway, sans-serif;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 36px;
  line-height: 48px;
  padding-bottom: 48px;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: black;
  font-family: Lusitana, serif;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label, .contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-family: Lusitana, serif;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #888;
  cursor: text;
  -webkit-transition: -webkit-transform .2s ease-in-out;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
  color: #fff;
  font-family: Raleway, sans-serif;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  line-height: 24px;
  padding: 8px 16px;
  border: none;
  cursor: pointer;
}

.note {
  position: absolute;
  left: 0;
  bottom: 10px;
  width: 100%;
  text-align: center;
  font-family: Lusitana, serif;
  font-size: 16px;
  line-height: 21px;
}
.note .link {
  color: #888;
  text-decoration: none;
}
.note .link:hover {
  text-decoration: underline;
}

</style>
@section('content')
 <!-- Breadcrumb Area Start -->
<br>
<br>
 <br>
  <br>
  <section class="get-in-touch">
   <h1 class="title">Get in touch</h1>
   <form method="POST" action="{{ route('Contact') }}">
                          @csrf
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <input type="text" name="user_name" class="form-control mb-30" placeholder="Your Name"required>
                                </div>
                                <div class="col-12 col-md-6">
                                    <input type="email" name="user_mail"  class="form-control mb-30" placeholder="Email"required>
                                </div>
                                <div class="col-12">
                                    <textarea name="message" name="user_feedback" class="form-control mb-30" placeholder="Messages"required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" value="Submit"class="btn alime-btn btn-2 mt-15">Send Messages</button>
                                </div>
                            </div>
                        </form>
</section>
  </div>
<br>
<br>
<br>
<br>
@endsection

@section('js')


@endsection