@extends('layouts.web')
@section('content')
<div class="body">
<div class="container">
    <div class="content">
        <div class="left-side">
            <div class="address details">
                <i class="fas fa-map-marker-alt"></i>
                <div class="topic">Address</div>
                <div class="text-one">Block-2, PECHS</div>
                <div class="text-two">Karachi, Sindh</div>
            </div>
            <div class="phone details">
                <i class="fas fa-phone-alt"></i>
                <div class="topic">Phone</div>
                <div class="text-one">+1324 9893 564</div>
                <div class="text-two">+1234 3434 568</div>
            </div>
            <div class="email details">
                <i class="fas fa-envelope"></i>
                <div class="topic">Email</div>
                <div class="text-one">blingcrafts@gmail.com</div>
                <div class="text-two">blinghelp@gmail.com</div>
            </div>
        </div>
        <div class="right-side">
            <div class="topic-text">Send us a message</div>
            <p>If you have any queries about the products, you can send us a message from here.<br>
                 It will be a pleasure to help you.</p>
            <form action="#">
                <div class="input-box">
                <label for="name">Your Name:</label>
                    <input type="text"  id="name" placeholder="Enter your name" />
                </div>
                <div class="input-box">
                <label for="email">Your Email:</label>
                    <input type="email" placeholder="Enter your email" />
                </div>
                <div class="input-box message-box">
                <label for="message">Your Message:</label>
                    <textarea placeholder="Enter your message"></textarea>
                </div>
                <div class="button">
                    <input type="submit" value="Send Now" />
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
