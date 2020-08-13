@extends('Front.layout2')
@section('content')
    <div class="contact-us-page">
        <div class="container">
            <div class="row">
                <div class="col-12 custom-card">
                    <div class="custom-card-title">فرم تماس با ما </div>
                    <form method="post" action="/api/v1/ContactUs">
                        <div class="row">
                            <div class="col-12 col-md-6 input-box">
                                <label>نام خانوادگی</label>
                                <div class="custom-input-wrapper">
                                    <input type="text" name="LastName" required>
                                </div>
                            </div>
                            <div class="col-12 col-md-6  input-box">
                                <label>نام</label>
                                <div class="custom-input-wrapper">
                                    <input type="text" name="FirstName" required>
                                </div>
                            </div>

                            <div class="col-12 col-md-6  input-box">
                                <label>ایمیل</label>
                                <div class="custom-input-wrapper">
                                    <input type="email" name="Email">
                                </div>
                            </div>
                            <div class="col-12 col-md-6  input-box">
                                <label>شماره تماس</label>
                                <div class="custom-input-wrapper">
                                    <input type="text" name="PhoneNumber" required>
                                </div>
                            </div>
                            <div class="col-12 input-box">
                                <label>نظر و پیشنهاد</label>
                                <div class="custom-input-wrapper">
                                    <textarea name="Text" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="submit-button">ثبت نظر</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
